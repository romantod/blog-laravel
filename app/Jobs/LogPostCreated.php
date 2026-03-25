<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use App\Models\Post;

class LogPostCreated implements ShouldQueue
{
    use Queueable;
    public int $tries = 3;
    public int $backoff = 5;

    /**
     * Create a new job instance.
     */
    public function __construct(public Post $post) { // Объявляет свойство $post в классе, принимает его как параметр конструктора, присваивает $this->post = $post      
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info('Пост создан: ' . $this->post->title); // Log — фасад Laravel для записи в лог файл. ::info() — уровень записи (info, error, warning, debug). $this->post->title — обращение к свойству объекта поста который передали в Job через конструктор
        // throw new \Exception('Тестовая ошибка'); // throw — выбросить исключение, то есть намеренно сломать выполнение. new \Exception(...) — создать объект исключения с сообщением. Когда Job бросает исключение — Laravel считает что Job упал
    }

    public function failed(\Throwable $exception) { // специальный метод который Laravel вызывает автоматически когда Job окончательно провалился (все попытки исчерпаны). \Throwable — тип параметра, это интерфейс который покрывает и Exception и Error — то есть любую ошибку
        Log::error('Job провалился: ' . $exception->getMessage());
    }
}

/*
dispatch($post) → таблица jobs → worker забирает → 
handle() бросает Exception → backoff 5 сек → 
повтор × 3 → все упали → failed_jobs → метод failed() → лог
*/
<?php

class Router
{
    /**
     * Array untuk menyimpan semua route
     * Format: ['GET' => [...], 'POST' => [...]]
     */
    private array $routes = [];

    /**
     * Tambah route GET
     */
    public function get(string $pattern, callable $handler)
    {
        $this->routes['GET'][$pattern] = $handler;
    }

    /**
     * Tambah route POST
     */
    public function post(string $pattern, callable $handler)
    {
        $this->routes['POST'][$pattern] = $handler;
    }

    /**
     * Dispatch request sesuai method & URI
     */
    public function dispatch(string $uri)
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = trim($uri, '/');

        // Cek setiap route sesuai method
        foreach ($this->routes[$method] ?? [] as $pattern => $handler) {
            if (preg_match($pattern, $uri, $matches)) {
                // hapus full match
                array_shift($matches);
                // panggil handler dengan parameter
                return call_user_func_array($handler, $matches);
            }
        }

        // 404 jika route tidak ditemukan
        http_response_code(404);
        echo '404 - Not Found';
    }
}

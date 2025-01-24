<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ConfirmModal extends Component
{
    public $title;
    public $body;
    public $url;
    public $tableName;

    public function __construct($title, $body, $url, $tableName)
    {
        $this->title = $title;
        $this->body = $body;
        $this->url = $url;
        $this->tableName = $tableName;
    }

    public function render()
    {
        return view('components.confirm-modal');
    }
}

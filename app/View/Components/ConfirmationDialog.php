<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ConfirmationDialog extends Component
{
    public $message;       // Message to display in the dialog
    public $confirmAction; // ID of the form to confirm action
    public $action;        // Action URL for form submission

    public function __construct($message, $confirmAction, $action)
    {
        $this->message = $message;
        $this->confirmAction = $confirmAction;
        $this->action = $action; // Set the action URL
    }

    public function render()
    {
        return view('components.confirmation-dialog');
    }
}

<?php

namespace Vanguard\Support\Plugins\Dashboard\Widgets;

use Illuminate\Contracts\View\View;
use Vanguard\Plugins\Widget;
use Vanguard\Repositories\User\UserRepository;
use Vanguard\Support\Enum\UserStatus;

class UnconfirmedUsers extends Widget
{
    /**
     * {@inheritdoc}
     */
    public ?string $width = '3';

    /**
     * {@inheritdoc}
     */
    protected string|\Closure|array $permissions = 'users.manage';

    public function __construct(protected readonly UserRepository $users)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function render(): View
    {
        return view('plugins.dashboard.widgets.unconfirmed-users', [
            'count' => $this->users->countByStatus(UserStatus::UNCONFIRMED),
        ]);
    }
}
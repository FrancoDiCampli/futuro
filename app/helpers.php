<?php

use App\Models\User;

/**
 * Return the authenticated user.
 *
 * @return App\Models\User
 */
function user(): User
{
    return auth()->user();
}

function recruiter()
{
    return user()->recruiter;
}

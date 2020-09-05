<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\setors;
use Authorization\IdentityInterface;

/**
 * setors policy
 */
class setorsPolicy
{
    /**
     * Check if $user can create setors
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\setors $setors
     * @return bool
     */
    public function canCreate(IdentityInterface $user, setors $setors)
    {
        return $this->isAdmin($user);
    }

    /**
     * Check if $user can update setors
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\setors $setors
     * @return bool
     */
    public function canUpdate(IdentityInterface $user, setors $setors)
    {
        return $this->isAdmin($user);
    }

    /**
     * Check if $user can delete setors
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\setors $setors
     * @return bool
     */
    public function canDelete(IdentityInterface $user, setors $setors)
    {
        return $this->isAdmin($user);
    }

    /**
     * Check if $user can view setors
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\setors $setors
     * @return bool
     */
    public function canView(IdentityInterface $user, setors $setors)
    {
        return $this->isAdmin($user);
    }

    protected function isAdmin(IdentityInterface $user) {
        return $user->usuario_tipo->nome === 'admin';
    }
}

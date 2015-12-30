<?php

namespace Scolarite\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ScolariteUserBundle extends Bundle {

    public function getParent() {
        return 'FOSUserBundle';
    }

}

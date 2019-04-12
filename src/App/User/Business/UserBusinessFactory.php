<?php
declare(strict_types=1);

namespace App\User\Business;


use App\User\Business\Model\User;
use App\User\Business\Model\UserInterface;
use App\User\Business\Model\Validator;
use App\User\Business\Model\ValidatorInterface;
use Xervice\Core\Business\Model\Factory\AbstractBusinessFactory;

/**
 * @method \App\User\Persistence\UserDataReaderInterface getReader()
 * @method \App\User\Persistence\UserDataWriterInterface getWriter()
 */
class UserBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \App\User\Business\Model\UserInterface
     */
    public function createUser(): UserInterface
    {
        return new User(
            $this->getReader(),
            $this->getWriter(),
            $this->createValidator()
        );
    }

    /**
     * @return \App\User\Business\Model\ValidatorInterface
     */
    public function createValidator(): ValidatorInterface
    {
        return new Validator(
            $this->getReader()
        );
    }
}
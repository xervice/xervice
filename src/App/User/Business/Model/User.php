<?php
declare(strict_types=1);

namespace App\User\Business\Model;


use App\User\Persistence\UserDataReaderInterface;
use App\User\Persistence\UserDataWriterInterface;
use DataProvider\UserDataProvider;

class User implements UserInterface
{
    /**
     * @var \App\User\Persistence\UserDataReaderInterface
     */
    private $userReader;

    /**
     * @var \App\User\Persistence\UserDataWriterInterface
     */
    private $userWriter;

    /**
     * @var \App\User\Business\Model\ValidatorInterface
     */
    private $validator;

    /**
     * User constructor.
     *
     * @param \App\User\Persistence\UserDataReaderInterface $userReader
     * @param \App\User\Persistence\UserDataWriterInterface $userWriter
     * @param \App\User\Business\Model\ValidatorInterface $validator
     */
    public function __construct(
        UserDataReaderInterface $userReader,
        UserDataWriterInterface $userWriter,
        ValidatorInterface $validator
    ) {
        $this->userReader = $userReader;
        $this->userWriter = $userWriter;
        $this->validator = $validator;
    }


    /**
     * @param int $userId
     *
     * @return \DataProvider\UserDataProvider
     */
    public function getUserById(int $userId): UserDataProvider
    {
        return $this->userReader->getOneUserById($userId);
    }

    /**
     * @param string $email
     *
     * @return \DataProvider\UserDataProvider
     */
    public function getUserByEmail(string $email): UserDataProvider
    {
        return $this->userReader->getOneUserByEmail($email);
    }

    /**
     * @param \DataProvider\UserDataProvider $userDataProvider
     *
     * @return \DataProvider\UserDataProvider
     */
    public function getUser(UserDataProvider $userDataProvider): UserDataProvider
    {
        if ($userDataProvider->hasUserId()) {
            $userDataProvider = $this->getUserById($userDataProvider->getUserId());
        } elseif ($userDataProvider->hasEmail()) {
            $userDataProvider = $this->getUserByEmail($userDataProvider->getEmail());
        }

        return $userDataProvider;
    }

    /**
     * @param \DataProvider\UserDataProvider $userDataProvider
     *
     * @return \DataProvider\UserDataProvider
     * @throws \App\User\Business\Exception\UserException
     */
    public function saveUser(UserDataProvider $userDataProvider): UserDataProvider
    {
        $this->validator->validate($userDataProvider);
        return $this->userWriter->writeUser($userDataProvider);
    }

    /**
     * @param \DataProvider\UserDataProvider $userDataProvider
     */
    public function deleteUser(UserDataProvider $userDataProvider): void
    {
        if (!$userDataProvider->hasUserId() && $userDataProvider->hasEmail()) {
            $userDataProvider = $this->getUserByEmail($userDataProvider->getEmail());
        }

        if ($userDataProvider->hasUserId()) {
            $this->userWriter->deleteUser($userDataProvider->getUserId());
        }
    }
}
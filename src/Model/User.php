<?

class user{
    private int $id;
    private string $username;
    private string $password;
    private string $published_date;


    public function getId(): int
    {
        return $this->id;
    }


    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getPublishedDate(): ?string
    {
        return $this->published_date;
    }

    public function setPublishedDate(string $published_date): void
    {
        $this->published_date = $published_date;
    }
}
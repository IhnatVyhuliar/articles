<?

    namespace App;
    class Article{
        public string $name;
        public string $name_id;
        public string $main_text;

        public function __construct(string $name, string $name_id, string $main_text)
        {
            $this->name=$name;
            $this->name_id=$name_id;
            $this->main_text=$main_text;
        }

    }


?>
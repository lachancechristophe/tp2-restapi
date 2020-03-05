<?php
/**
 *
 *
 */
class TestView  {

    public const TAG_LABEL_BEGIN = '<';
    public const TAG_LABEL_END = '>';
    public const TAG_SYMBOL_END_TAG = '/';

    public const SEPARATOR = ' ';

    public const TAG_TITLE = 'h1';
    public const TAG_SUBTITLE = 'h2';
    public const TAG_STATEMENT = 'p';

    public const SUCCES = 'SUCCÈS';
    public const ECHEC = 'ÉCHEC';

    public const TITLE = 'Tests pour "Customers, Rentals and Movies"';
    public const SUBTITLE_MOVIE = 'Films';
    public const SUBTITLE_RENTAL = 'Locations';
    public const SUBTITLE_CUSTOMER = 'Clients';
    public const SUBTITLE_SCENARIO = 'Scénario';

    private $output;

    function __construct() {
        $this->init();
    }

    public function init() {
        $this->output = '';
        $this->addTitle();
    }

    public function getOutput(): string {
        return (string) $this->output;
    }

    public function addTitle() {
        $this->addNewLine(self::TAG_TITLE, self::TITLE);
    }

    public function addSubTitleMovie() {
        $this->addNewLine(self::TAG_SUBTITLE, self::SUBTITLE_MOVIE);
    }

    public function addSubTitleRental() {
        $this->addNewLine(self::TAG_SUBTITLE, self::SUBTITLE_RENTAL);
    }

    public function addSubTitleCustomer() {
        $this->addNewLine(self::TAG_SUBTITLE, self::SUBTITLE_CUSTOMER);
    }

    public function addSubTitleScenario() {
        $this->addNewLine(self::TAG_SUBTITLE, self::SUBTITLE_SCENARIO);
    }

    public function addStatement(string $testName, bool $isSuccess) {
        $this->addPlainStatement(
            $this->strSuccess($isSuccess) .
            self::SEPARATOR .
            $testName
        );
    }

    public function addPlainStatement(string $content) {
        $this->addNewLine(
            self::TAG_STATEMENT,
            $content
        );
    }

    private function strSuccess(bool $isSuccess): string {
        return ($isSuccess) ? self::SUCCES : self::ECHEC;
    }

    private function addNewLine(string $tag, string $content) {
        $this->output .=
            self::TAG_LABEL_BEGIN .
            $tag .
            self::TAG_LABEL_END .
            $content .
            self::TAG_LABEL_BEGIN .
            self::TAG_SYMBOL_END_TAG .
            $tag .
            self::TAG_LABEL_END;
    }
}
?>

<?php


class PrestationModel {
    const TYPE_ANALYSE = 'Analyse';
    const TYPE_RADIO = 'Radio';

    private $type;

    public function __construct($type) {
        $this->type = $type;
    }

    // Getter

    public function getType() {
        return $this->type;
    }
}

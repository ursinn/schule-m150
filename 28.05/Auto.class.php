<?php
/**
 * This is free and unencumbered software released into the public domain.
 *
 * Anyone is free to copy, modify, publish, use, compile, sell, or
 * distribute this software, either in source code form or as a compiled
 * binary, for any purpose, commercial or non-commercial, and by any
 * means.
 *
 * In jurisdictions that recognize copyright laws, the author or authors
 * of this software dedicate any and all copyright interest in the
 * software to the public domain. We make this dedication for the benefit
 * of the public at large and to the detriment of our heirs and
 * successors. We intend this dedication to be an overt act of
 * relinquishment in perpetuity of all present and future rights to this
 * software under copyright law.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
 * IN NO EVENT SHALL THE AUTHORS BE LIABLE FOR ANY CLAIM, DAMAGES OR
 * OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE,
 * ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
 * OTHER DEALINGS IN THE SOFTWARE.
 *
 * For more information, please refer to <http://unlicense.org>
 */

class Auto
{
    private $marke;
    private $modell;
    private $geschwindigkeit = 0;
    private $geschw_max;
    private $bremsentemp = 20;

    public function __construct(string $marke, string $modell, int $geschw_max)
    {
        $this->marke = $marke;
        $this->modell = $modell;
        $this->geschw_max = $geschw_max;
    }

    public function __destruct()
    {
        echo $this->marke . " (" . $this->modell . ") wurde von der Polizei angehalten und leider stillgelegt \n\n";
    }

    public function beschleunigen(int $time) {
        $this->geschwindigkeit += 10 * $time;
        if ($this->geschwindigkeit > $this->geschw_max)
            $this->geschwindigkeit = $this->geschw_max;
        echo $this->marke . " (" . $this->modell . ") beschleunigt " . $time . " und fährt jetzt " . $this->geschwindigkeit . " km/h \n\n";
    }

    public function bremsen(int $time) {
        $this->geschwindigkeit -= 5 * $time;
        if ($this->geschwindigkeit < 0)
            $this->geschwindigkeit = 0;
        $this->bremsentemp += 5 * $time;
        echo $this->marke . " (" . $this->modell . ") bremst " . $time . " und fährt noch " . $this->geschwindigkeit . " km/h \n\n";
        if ($this->bremsentemp > 150)
            echo "Autsch! Die Bremsen sind zu warm (Wert: " . $this->bremsentemp .") \n\n";
    }

    public function __clone()
    {
        $this->modell = $this->modell . " - Klon";
    }

    public function ausgabe() {
        echo "Automarke: " . $this->marke . "\n";
        echo "Modell: " . $this->modell . "\n";
        echo "Höchstgeschwindigkeit: " . $this->geschw_max . "\n";
        echo "momentane Geschwindikeit: 225". "\n";
        echo "Bremsentemperatur: " . $this->bremsentemp . "\n\n";
    }

}
<?php
require('fpdf.php');

class PDF extends FPDF
{

// Page header
function Header()
{
    // Logo
    //$this->Image('..\image\tesda.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','',8);
    // Move to the right
    $this->Cell(250);
    // tesda form #
    $this->Cell(30,5,'TESDA-OP-AS-03-02',0,1,'C');
    $this->Cell(250);
    $this->Cell(30,2,'Rev. No. 01-10/01/20',0,1,'C');

    $this->SetFont('Arial','B',12);
    // Move to the right
    $this->Cell(125);
    // tesda form #
    $this->Cell(30,10,'MONITORING REPORTS OF CUSTOMER FEEDBACK FORM RESULTS',0,1,'C');

    $this->SetFont('Arial','B',10);
    // tesda form #
    $this->Cell(30,5,'Region:',0,1);
    $this->Cell(30,5,'Province:',0,1);
    $this->Cell(30,5,'TTI:',0,1);
    $this->Cell(30,5,'Period Covered:',0,1);

    // Line break
    $this->Ln(5);
}

function WordWrap(&$text, $maxwidth)
{
    $text = trim($text);
    if ($text==='')
        return 0;
    $space = $this->GetStringWidth(' ');
    $lines = explode("\n", $text);
    $text = '';
    $count = 0;

    foreach ($lines as $line)
    {
        $words = preg_split('/ +/', $line);
        $width = 0;

        foreach ($words as $word)
        {
            $wordwidth = $this->GetStringWidth($word);
            if ($wordwidth > $maxwidth)
            {
                // Word is too long, we cut it
                for($i=0; $i<strlen($word); $i++)
                {
                    $wordwidth = $this->GetStringWidth(substr($word, $i, 1));
                    if($width + $wordwidth <= $maxwidth)
                    {
                        $width += $wordwidth;
                        $text .= substr($word, $i, 1);
                    }
                    else
                    {
                        $width = $wordwidth;
                        $text = rtrim($text)."\n".substr($word, $i, 1);
                        $count++;
                    }
                }
            }
            elseif($width + $wordwidth <= $maxwidth)
            {
                $width += $wordwidth + $space;
                $text .= $word.' ';
            }
            else
            {
                $width = $wordwidth + $space;
                $text = rtrim($text)."\n".$word.' ';
                $count++;
            }
        }
        $text = rtrim($text)."\n";
        $count++;
    }
    $text = rtrim($text);
    return $count;
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}

}
?>
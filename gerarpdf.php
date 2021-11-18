<?php
include 'fpdf/fpdf.php';
include 'connection.php';

class PDF extends FPDF{
// Page header
function Header(){
        // Logo
        $this->Image('img/logo.png',10,6,30);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(30,10,'RecFeira',0,0,'C');
        // Line break
        $this->Ln(20);
    }

// Page footer
function Footer(){
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

$id = $_GET['id'];

$sql = "SELECT * FROM fpdf WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', '16');
$pdf->Cell(190, 10, "FICHA CADASTRAL DE FEIRANTE", 0, 1, "C");
$pdf->Ln(15);

$pdf->SetFont("Arial", "B", 12);
$pdf->Cell(190, 10, "DADOS PESSOAIS", 1 , 1, "C");
$pdf->SetFont("Arial", "", 12);
$pdf->Cell(190, 10, "Nome: ".utf8_decode($row['nome'])."", 1);
$pdf->Ln();

$pdf->Cell(95, 10, "CPF: " .$row['cpf']. "", 1, 0);
$pdf->Cell(95, 10, "RG: " .$row['rg']. "", 1, 0);
$pdf->Ln();
$pdf->Cell(95, 10, "Email: " .$row['email']. "", 1, 0);
$pdf->Cell(95, 10, "Telefone: " .$row['telefone']. "", 1, 0);
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont("Arial", "B", 12);
$pdf->Cell(190, 10, utf8_decode("ENDEREÇO"), 1 , 1, "C");
$pdf->SetFont("Arial", "", 12);
$pdf->Cell(63.3, 10, "CEP: ". $row['cep'], 1, 0);
$pdf->Cell(63.3, 10, "Cidade: ". $row['cidade'], 1, 0);
$pdf->Cell(63.4, 10, "Bairro: ". $row['bairro'], 1, 0);
$pdf->Ln();
$pdf->Cell(150, 10, "Rua: ". $row['rua'], 1, 0);
$pdf->Cell(40, 10, "UF: ". $row['uf'], 1, 0);
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont("Arial", "B", 12);
$pdf->Cell(190, 10, utf8_decode("ATIVIDADE"), 1 , 1, "C");
$pdf->SetFont("Arial", "", 12);
$pdf->Cell(95, 10, "Atividade: ". $row['atividade'], 1, 0);
$pdf->Cell(95, 10, "Valor: R$" .$row['valor']. "", 1, 0);
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont("Arial", "B", 12);
$pdf->Cell(190, 10, utf8_decode("LOCAL / PLANO DE PAGAMENTO / SITUAÇÂO"), 1, 0, "C");
$pdf->Ln();
$pdf->Cell(63.3, 10, "LOCAL", 1, 0);
$pdf->Cell(63.3, 10, "PLANO", 1, 0);
$pdf->Cell(63.4, 10, utf8_decode("SITUAÇÃO"), 1, 0);
$pdf->Ln();
$pdf->SetFont("Arial", "", 12);
$pdf->Cell(63.3, 10, "Nome da cidade", 1, 0);
$pdf->Cell(63.3, 10, $row['planoPag'], 1, 0);
$pdf->Cell(63.4, 10, "Em dia / Em atraso", 1, 0);
$pdf->Ln();
$pdf->Cell(63.3, 10, "", 1, 0);
$pdf->Cell(63.3, 10, "", 1, 0);
$pdf->Cell(63.4, 10, "", 1, 0);
$pdf->Ln();
$pdf->Cell(63.3, 10, "", 1, 0);
$pdf->Cell(63.3, 10, "", 1, 0);
$pdf->Cell(63.4, 10, "", 1, 0);
$pdf->Ln();
$pdf->Cell(63.3, 10, "", 1, 0);
$pdf->Cell(63.3, 10, "", 1, 0);
$pdf->Cell(63.4, 10, "", 1, 0);
$pdf->Ln();
$pdf->Cell(63.3, 10, "", 1, 0);
$pdf->Cell(63.3, 10, "", 1, 0);
$pdf->Cell(63.4, 10, "", 1, 0);


$pdf->Output();
?>
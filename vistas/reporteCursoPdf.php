<?php
    /**
     * Sistema de gestión de personal
     * Version 1.0
     * @author Ing. Julio Avila
     */
    
    //include "../seguridad/seguridad.php";
    require('../lib/fpdf/fpdf.php');
    require("../controlador/MainController.php");
    require("../modelo/Persona.php");
    require("../modelo/Curso.php");
    $cedula=$_GET['cedula'];

class PDF extends FPDF
{
    
// Cabecera de página
function Header()
{
	//Fondo
	$this->Image('../images/personal.png','12','10','60','30','PNG');
	date_default_timezone_set('America/Caracas');
	setlocale(LC_ALL,"spanish");
	$this->Ln(-10);
	$this->Cell(135);
	$this->SetFont('Arial','',10);
	$this->Cell(50,30,ucfirst(strftime("%A, %d de %B de %Y")));
	$this->Ln();
            
}
    
// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,11,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
    
    
function Mostrar_Persona()
{
    $consultar = new MainController();
    $curso = new Curso();
    $id=$_GET['id'];
    $resultado = $consultar ->consultaDetallesPlanCurso($id);
	if($resultado!=0){
            foreach ($resultado as $valor) {
                $curso -> nombre = $valor['nombre'];
                $curso -> setFecha($valor['fecha']);
                $curso -> duracion = $valor['duracion'];
            }
                
            //Datos
            $this->Ln(-25);
            $this->Cell(10);
            $this->SetFont('Arial','BU',12);
            $this->Cell(70,10,'DATOS DEL CURSO');
            $this->Ln();
            $this->Ln(7);
            $this->Cell(10);
            $this->SetFont('Arial','B',11);
            $this->Cell(19,6,'Nombre:');
            $this->SetFont('Arial','',11);
            $this->Cell(30,6,$curso -> nombre);
            $this->Ln(7);
            $this->Cell(10);
            $this->SetFont('Arial','B',11);
            $this->Cell(20,6,utf8_decode('Duración:'));
            $this->SetFont('Arial','',11);
            $this->Cell(30,6,$curso -> duracion.' Horas');
            $this->Ln(7);
            $this->Cell(10);
            $this->SetFont('Arial','B',11);
            $this->Cell(32,6,utf8_decode('Fecha de inicio:'));
            $this->SetFont('Arial','',11);
            $this->Cell(25,6,$curso -> getFecha());
                
            $this->Ln(20);
            $this->Cell(10);
            $this->SetFont('Arial','BU',12);
            $this->Cell(70,10,'ASISTENTES');
            $this->Ln(5);
            $persona = new Persona();
            $i = 0;
            foreach ($resultado as $valor2) {
                $persona -> id = $valor2['id_persona'];
                $persona -> nombres = $valor2['nombres'];
                $persona -> apellidos = $valor2['apellidos'];
                $nombrePersona = $persona -> nombres." ".$persona -> apellidos;            
                $i++;
                $this->Ln(10);
                $this->Cell(10);
                $this->SetFont('Arial','',11);
                $this->Cell(90,6,utf8_decode($i.'. '.$nombrePersona));	
            }	
                
	}
            
        function SetLineStyle($style) {
            extract($style);
            if (isset($width)) {
                $width_prev = $this->LineWidth;
                $this->SetLineWidth($width);
                $this->LineWidth = $width_prev;
            }
            if (isset($cap)) {
                $ca = array('butt' => 0, 'round'=> 1, 'square' => 2);
                if (isset($ca[$cap]))
                    $this->_out($ca[$cap] . ' J');
            }
            if (isset($join)) {
                $ja = array('miter' => 0, 'round' => 1, 'bevel' => 2);
                if (isset($ja[$join]))
                    $this->_out($ja[$join] . ' j');
            }
            if (isset($dash)) {
                $dash_string = '';
                if ($dash) {
                    $tab = explode(', ', $dash);
                    $dash_string = '';
                    foreach ($tab as $i => $v) {
                        if ($i > 0)
                            $dash_string .= ' ';
                        $dash_string .= sprintf('%.2F', $v);
                    }
                }
                if (!isset($phase) || !$dash)
                    $phase = 0;
                $this->_out(sprintf('[%s] %.2F d', $dash_string, $phase));
            }
            if (isset($color)) {
                list($r, $g, $b) = $color;
                $this->SetDrawColor($r, $g, $b);
            }
        }
            
        // Draws a line
        // Parameters:
        // - x1, y1: Start point
        // - x2, y2: End point
        // - style: Line style. Array like for SetLineStyle
        function Line($x1, $y1, $x2, $y2, $style = null) {
            if ($style)
                $this->SetLineStyle($style);
            parent::Line($x1, $y1, $x2, $y2);
        }
    }
}
    
$pdf = new PDF('P','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetY(65);
$pdf->SetAutoPageBreak(false, 0);
$pdf->Mostrar_Persona();
// Line
$styleLine = array('width' => 0.5, 'cap' => 'round', 'join' => 'round', 'dash' => '20, 5', 'color' => array(0, 0, 0));
$pdf->Line(22, 85, 187, 85, $styleLine);
$pdf->SetFont('Arial','',12);
//$pdf->Output();
$pdf->Output('Reporte_'.$id.'.pdf','D');
    
?>
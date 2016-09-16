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
    require("../modelo/Evaluacion.php");
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
    $persona = new Persona();
    $evaluacion = new Evaluacion();
    
    $cedula=$_GET['cedula'];
    $resultado = $consultar ->consultaReportePersona($cedula);
	if($resultado!=0){
            foreach ($resultado as $valor) {
                $persona -> id=$valor['id'];
                $persona -> nombres=$valor['nombres'];
                $persona -> apellidos=$valor['apellidos'];
                $persona -> cedula=$valor['cedula'];
                $persona ->setFechaNacimiento($valor['fnacimiento']);
                $persona -> correo=$valor['correo'];
                $persona -> telefono=$valor['telefono'];
                $persona -> direccion=$valor['direccion'];
                $persona -> setTipoSangre($valor['grupo_sangre']);
                $persona -> setEstadoCivil($valor['estado_civil']);
                $persona -> setGenero($valor['genero']);
                $persona -> setNivelAcademico($valor['nivel_academico']);
                $persona -> hijos=$valor['hijos'];
                $evaluacion -> documentos=$valor['documentos'];
                $evaluacion -> setPruebaTecnica($valor['prueba_tecnica']);
                $evaluacion -> setPruebaPsico($valor['prueba_psico']);
                $evaluacion -> setObservacionesPsico($valor['observaciones_psico']);
                $evaluacion -> setComentarios($valor['comentarios']);
            }

            //Datos
            $this->Ln(-25);
            $this->Cell(10);
            $this->SetFont('Arial','BU',12);
            $this->Cell(70,10,'DATOS PERSONALES');
            $this->Ln();
            $this->Ln(7);
            $this->Cell(10);
            $this->SetFont('Arial','B',11);
            $this->Cell(19,6,'Nombres:');
            $this->SetFont('Arial','',11);
            $this->Cell(30,6,utf8_decode($persona -> nombres));
            $this->Ln(7);
            $this->Cell(10);
            $this->SetFont('Arial','B',11);
            $this->Cell(20,6,'Apellidos:');
            $this->SetFont('Arial','',11);
            $this->Cell(30,6,utf8_decode($persona -> apellidos));
            $this->Ln(7);
            $this->Cell(10);
            $this->SetFont('Arial','B',11);
            $this->Cell(15,6,utf8_decode('Cédula:'));
            $this->SetFont('Arial','',11);
            $this->Cell(25,6,$persona -> cedula);
            $this->Ln(7);
            $this->Cell(10);
            $this->SetFont('Arial','B',11);
            $this->Cell(41,6,'Fecha de Nacimiento:');
            $this->SetFont('Arial','',11);
            $this->Cell(25,6,$persona -> getFechaNacimiento());
            $this->Ln(7);
            $this->Cell(10);
            $this->SetFont('Arial','B',11);
            $this->Cell(12,6,utf8_decode('Sexo:'));
            $this->SetFont('Arial','',11);
            $this->Cell(20,6,$persona -> getGenero());
            $this->Ln(7);
            $this->Cell(10);
            $this->SetFont('Arial','B',11);
            $this->Cell(24,6,utf8_decode('Estado civil:'));
            $this->SetFont('Arial','',11);
            $this->Cell(20,6,$persona -> getEstadoCivil());
            $this->Ln(7);
            $this->Cell(10);
            $this->SetFont('Arial','B',11);
            $this->Cell(19,6,utf8_decode('Hijos(as):'));
            $this->SetFont('Arial','',11);
            $this->Cell(30,6,$persona -> hijos);        
            $this->Ln(7);
            $this->Cell(10);
            $this->SetFont('Arial','B',11);
            $this->Cell(24,6,utf8_decode('Tipo sangre:'));
            $this->SetFont('Arial','',11);
            $this->Cell(20,6,$persona ->getTipoSangre());
            $this->Ln(7);
            $this->Cell(10);
            $this->SetFont('Arial','B',11);
            $this->Cell(15,6,'Correo:');
            $this->SetFont('Arial','',11);
            $this->Cell(30,6,$persona -> correo);
            $this->Ln(7);
            $this->Cell(10);
            $this->SetFont('Arial','B',11);
            $this->Cell(33,6,utf8_decode('Nivel académico:'));
            $this->SetFont('Arial','',11);
            $this->Cell(30,6,$persona -> getNivelAcademico());        
            $this->Ln(7);
            $this->Cell(10);
            $this->SetFont('Arial','B',11);
            $this->Cell(20,6,utf8_decode('Dirección:'));
            $this->SetFont('Arial','',11);
            $this->MultiCell(145,6,utf8_decode($persona -> direccion), $border=0, $align='J', $fill=false);

            $this->Ln(20);
            $this->Cell(10);
            $this->SetFont('Arial','BU',12);
            $this->Cell(70,10,'RESULTADOS');

            $this->Ln();
            $this->Ln(6);
            $this->Cell(10);
            $this->SetFont('Arial','B',11); 
            $this->Cell(20,6,utf8_decode('.- Evaluación técnica'));
            $this->Ln(10);
            $this->Cell(15);
            $this->SetFont('Arial','',11);
            $this->Cell(90,6,$evaluacion -> getPruebaTecnica());	

            $this->Ln(10);
            $this->Cell(10);
            $this->SetFont('Arial','B',11);
            $this->Cell(20,6,utf8_decode('.- Evaluación psicológica'));
            $this->Ln(10);
            $this->Cell(15);
            $this->SetFont('Arial','',11);
            $this->Cell(30,6,$evaluacion -> getPruebaPsico());		

            $this->Ln(10);
            $this->Cell(10);
            $this->SetFont('Arial','B',11);
            $this->Cell(20,6,utf8_decode('.- Observaciones psicólogo'));
            $this->Ln(10);
            $this->Cell(15);
            $this->SetFont('Arial','',11);
            $this->MultiCell(165,6,utf8_decode($evaluacion ->getObservacionesPsico()), $border=0, $align='J', $fill=false);	

            $this->Ln(10);
            $this->Cell(10);
            $this->SetFont('Arial','B',11);
            $this->Cell(20,6,utf8_decode('.- Observaciones'));
            $this->Ln(10);
            $this->Cell(15);
            $this->SetFont('Arial','',11);
            $this->MultiCell(165,6,utf8_decode($evaluacion ->getComentarios()), $border=0, $align='J', $fill=false);	

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
$pdf->Line(22, 145, 187, 145, $styleLine);
$pdf->SetFont('Arial','',12);
//$pdf->Output();
$pdf->Output('Reporte_'.$cedula.'.pdf','D');

?>
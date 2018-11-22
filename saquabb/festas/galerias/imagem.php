<?
#TAG <img src='thumb.php?y=60&x=75&img=fotos/foto.gif'><br>
# Arquivo: thumb.php
# Autor: Helbert Fernandes - estaleiroweb
// Constantes: variaveis que não mudam em todo o programa
define('MAX_WIDTH' , (isset($_GET['x']))?$_GET['x']:160);
define('MAX_HEIGHT', (isset($_GET['y']))?$_GET['y']:120);

# Pega onde está a imagem
$original=$img;
$temp=explode('/',$_GET['img']);
$image_file = array_pop($temp);
$image_path = implode('/',$temp);

# Carrega a imagem
if (!file_exists($img)) $image_file='';
switch (strtolower(end(explode('.',$image_file))))
{
        case 'jpg':
                $img = @imagecreatefromjpeg($img);
                mostraImg('imagejpeg',$img,MAX_WIDTH,MAX_HEIGHT);
                break;
        case 'png':
                $img = @imagecreatefrompng($img);
                mostraImg('imagepng',$img,MAX_WIDTH,MAX_HEIGHT);
                break;
        case 'gif':
                $img = @imagecreatefromgif($img);
                mostraImg('imagegif',$img,MAX_WIDTH,MAX_HEIGHT);
                break;
        case 'bmp':
                $img = @imagecreatefromwbmp ($img);
                mostraImg('imagewbmp',$img,MAX_WIDTH,MAX_HEIGHT);
                break;
        default:
            $img = imagecreate(160, 120);
            imagecolorallocate($img, 255, 255, 255);
            $c = imagecolorallocate($img, 153, 153, 153);
            $c1 = imagecolorallocate($img, 0, 0, 0);
            //imageline($img, 0, 0, 160, 120, $c);
            //imageline($img, 160, 0, 0, 120, $c);
            //imagestring($img, 5, 60, 20, "ERRO:", $c1);
            //imagestring($img, 5, 65, 50, "Sem", $c1);
            //imagestring($img, 5, 50, 70, "Imagem", $c1);
            imagestring($img, 1, 5, 5, "Erro 404", $c1);
            imagestring($img, 1, 5, 15, "$original", $c1);
            mostraImg('imagejpeg',$img,MAX_WIDTH,MAX_HEIGHT);
}

function tamanhoImg($img,$x,$y)
{
        // Pega o tamanho da imagem e proporção de resize
        $width = @imagesx($img);
        $height = @imagesy($img);
        if($width==0 or $height==0)
        {
            $img = imagecreate(160, 120);
            imagecolorallocate($img, 255, 255, 255);
            $c = imagecolorallocate($img, 153, 153, 153);
            $c1 = imagecolorallocate($img, 0, 0, 0);
            imagestring($img, 1, 5, 5, "Erro 404", $c1);
            imagestring($img, 1, 5, 15, "$img", $c1);
            mostraImg('imagejpeg',$img,MAX_WIDTH,MAX_HEIGHT);
            exit();
        }
        $scale = min($x/$width, $y/$height);
        // Se a imagem é maior que o permitido, encolhe ela!
        if ($scale < 1) {
            if($width>$height)
            {
                    if($x!=0)
                    {
                     $new_width=$x;
                     $new_height=(($x * $height)/$width);
                     settype ($new_height, "integer");
                    }
                    else
                    {
                     $new_width=$y;
                     $new_height=(($y*$height)/$width) ;
                     settype($new_height,"integer");
                    }
            }
            else if($width<$height)
            {
                    if($y!=0)
                    {
                     $new_width=(($y*$width)/$height);
                     $new_height=$y;
                     settype($new_width, "integer");
                    }
                    else
                    {
                     $new_height=$x;
                     $new_width=(($x*$width)/$height);
                     settype($new_width,"integer");
                    }
            }
            else
            {
                    $new_width = $new_size ;
                    $new_height = $new_size ;
            }
            // Cria uma imagem temporária
            $tmp_img = imagecreatetruecolor($new_width, $new_height);
            // Copia e resize a imagem velha na nova
            imagecopyresized($tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
            imagedestroy($img);
            $img = $tmp_img;
        }
        return $img;
}
function mostraImg($funcao,$img,$x,$y)
{
        if (!function_exists($funcao)) $funcao='imagejpeg';
        switch ($funcao)
        {
                case 'imagejpeg':
                        header('Content-type: image/jpeg');
                        imagejpeg(tamanhoImg($img,$x,$y),"",90);
                        break;
                case 'imagegif':
                        header('Content-type: image/gif');
                        imagegif(tamanhoImg($img,$x,$y));
                        break;
                case 'imagepng':
                        header('Content-type: image/png');
                        imagepng(tamanhoImg($img,$x,$y));
                        break;
                case 'imagewbmp':
                        header('Content-type: image/vnd.wap.wbmp');
                        imagewbmp(tamanhoImg($img,$x,$y));
                        break;
        }
}
?>
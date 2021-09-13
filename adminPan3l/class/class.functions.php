<?php
date_default_timezone_set('Asia/Katmandu');

class Functions extends Query
{
    function __construct()
    {
        //$obj = new parent();

    }

    function printr($array)
    {
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }

    function redirect($url)
    {
        ?>
        <script>
            window.location='<?php echo $url ?>';
        </script>
        <?php
    }

    function getDate()
    {
        return (date('Y-m-d'));
    }

    function text($id, $name, $value)
    {
        echo '<input type="text" name="' . $name . '" id="' . $id . '" value="' . $value . '">';
    }

    function password($id, $name, $value)
    {
        echo '<input type="password" name="' . $name . '" id="' . $id . '" value="' . $value . '">';
    }

    function hidden($id = '', $name, $value)
    {
        echo '<input type="hidden" name="' . $name . '" id="' . $id . '" value="' . $value . '">';
    }

    function radio($id = '', $class, $name, $value, $data)
    {
        echo '<label><input type="radio" class ="' . $class . '" name="' . $name . '" id="' . $id . '" value ="' . $value . '">' . $data . '</label>';
    }

    function selectBox($id, $type, $name, $value, $data)
    {
        self::print_array($data);
        echo '	<select name="' . $name . '" ' . $type . '>';

        for ($i = 0;$i < count($data);$i++)
        {
            echo '<option value="' . $value[$i] . '">' . $data[$i];
        }

        echo '		</select>';
    }

    function checkBox($id, $name, $value, $data)
    {
        echo '<label><input id = "' . $id . '" type="checkbox" name="' . $name . '" value="' . $value . '"">' . $data . '</label>';
    }

    function textArea($id, $class, $name, $value, $col, $row)
    {
        echo '<textarea name="' . $name . '" id="' . $id . '" class="' . $class . '" cols="' . $col . '" rows="' . $row . '">' . $value . '</textarea>';
    }
    function button($id, $name, $value)
    {
        echo '<input type="button" name="' . $name . '" id="' . $id . '" value="' . $value . '">';
    }

    function submit($id, $name, $value)
    {
        echo '<input type="submit" name="' . $name . '" class=""id="' . $id . '" value="' . $value . '">';
    }

    function img($param)
    {
        if ($param['width'] == '') $param['width'] = '200';
        if ($param['height'] == '') $param['height'] = '200';

        if (is_file($param['path']))
        {
            ?>
            <img src="imager.php?upfile=<?php echo $param['path'] ?>&max_width=<?php echo $param['width'] ?>&max_height=<?php echo $param['height'] ?>"
                <?php if ($param['class'] != '') echo 'class="' . $param['class'] . '"'; ?> <?php if ($param['alt'] != '') echo 'alt="' . $param['alt'] . '"'; ?>
                <?php if ($param['style'] != '') echo 'style="' . $param['style'] . '"'; ?>>
            <?php
        }
        else
        {
            ?>
            <img src="imager.php?upfile=design/no-image.png&max_width=<?php echo $param['width'] ?>&max_height=<?php echo $param['height'] ?>"
                <?php if ($param['class'] != '') echo 'class="' . $param['class'] . '"'; ?> <?php if ($param['alt'] != '') echo 'alt="' . $param['alt'] . '"'; ?>
                <?php if ($param['style'] != '') echo 'style="' . $param['style'] . '"'; ?>>
            <?php
        }
    }
    function uploadImage($array_name, $imageName, $path)
    {
        //self::print_array($_FILES);
        $extension = pathinfo($_FILES[$array_name]['name'], PATHINFO_EXTENSION);

        //echo $_FILES[$array_name]['tmp_name'];
        //echo $path.$imageName;
        if ($extension == 'gif' || $extension == 'jpeg' || $extension == 'png' || $extension == 'jpg' || $extension == 'GIF' || $extension == 'JPEG' || $extension == 'PNG' || $extension == 'JPG')
        {
            if (move_uploaded_file($_FILES[$array_name]['tmp_name'], $path . $imageName))
            {
                return (true);
            }
            else
            {
                return (false);
            }
        }
        else
        {
            return (false);
        }
    }

    function uploadPdf($array_name, $imageName, $path)
    {
        //self::print_array($_FILES);
        $extension = pathinfo($_FILES[$array_name]['name'], PATHINFO_EXTENSION);

        //echo $_FILES[$array_name]['tmp_name'];
        //echo $path.$imageName;
        if ($extension == 'pdf' || $extension == 'PDF' || $extension == 'doc' || $extension == 'DOC' || $extension == 'docx' || $extension == 'DOCX' || $extension == 'txt' || $extension == 'TXT')
        {
            if (move_uploaded_file($_FILES[$array_name]['tmp_name'], $path . $imageName))
            {
                return (true);
            }
            else
            {
                return (false);
            }
        }
        else
        {
            return (false);
        }
    }

    function uploadVideo($array_name, $path)
    {

        $extension = pathinfo($_FILES[$array_name]['name'], PATHINFO_EXTENSION);

        if ($extension == 'wmv' || $extension == 'mp4' || $extension == 'avi' || $extension == '3gp')
        {

            if (move_uploaded_file($_FILES[$array_name]['tmp_name'], $path . $_FILES[$array_name]['name']))
            {
                return (true);
            }
            else
            {
                return (false);
            }
        }
        else
        {
            return (false);
        }
    }

    function createThumb($filename, $pathToImages, $pathToThumbs, $thumbWidth)
    {
        $fname = $filename;

        $info = pathinfo($pathToImages);

        $image = $pathToImages . $filename;

        $exploded_image = explode('.', $image);

        //self::print_array($exploded_image);
        $extention = $exploded_image[3];

        if (strtolower($extention) == 'jpg')
        {
            $img = imagecreatefromjpeg("{$pathToImages}{$fname}");
        }
        else if (strtolower($extention) == 'png')
        {
            $img = imagecreatefrompng("{$pathToImages}{$fname}");
        }
        else if (strtolower($extention) == 'jpeg')
        {
            $img = imagecreatefromjpeg("{$pathToImages}{$fname}");
        }
        else if (strtolower($extention) == 'gif')
        {
            $img = imagecreatefromgif("{$pathToImages}{$fname}");
        }

        $width = imagesx($img);
        $height = imagesy($img);

        // calculate thumbnail size
        $new_width = $thumbWidth;
        $new_height = floor($height * ($thumbWidth / $width));

        // create a new temporary image
        $tmp_img = imagecreatetruecolor($new_width, $new_height);

        // copy and resize old image into new image
        imagecopyresized($tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

        // save thumbnail into a file
        if (imagejpeg($tmp_img, "{$pathToThumbs}{$fname}"))
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    function createPdf($filename, $contents)
    {
        echo $filename . '-' . $contents;

        $file = "../uploads/info/" . $filename . ".rtf";

        $fp = fopen($file, "w+") or die("Could Not Open");

        file_put_contents($file, $contents, FILE_APPEND);

        fclose($fp);
    }

    function removeTags($string)
    {
        $string = str_replace('&nbsp;', '', $string);

        $string = str_replace('&nbsp', '', $string);

        $string = strip_tags($string);
        //$string = preg_match();
        return ($string);
    }

    function dateFormat($date)
    {
        $temp = explode('/', $date);

        if (count($temp) == 3)
        {
            $newDate = $temp[2] . '-' . $temp[0] . '-' . $temp[1];
        }
        else
        {
            $newDate = $date;
        }

        return ($newDate);
    }

    function delImage($image)
    {
        if (is_file($image)) unlink($image);
    }

    function slug($text)
    {
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

        $text = trim($text, '-');

        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        $text = strtolower($text);

        $text = preg_replace('~[^-\w]+~', '', $text);

        if (empty($text))
        {
            return 'N/A';
        }

        return $text;
    }

    function ren($name)
    {
        $filename = basename($name);

        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        $newName = uniqid(md5(rand()) , true) . '.' . $extension;

        return $newName;
    }
}
?>

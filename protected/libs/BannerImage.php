<?php



/**
 * BannerImage is responsible for all banner images.
 *
 * This class handles all tasks related to banner images.
 * Will used for Space or User Passports.
 *
 * Prefixes:
 *  "" = Resized banner image
 *  "_org" = Orginal uploaded file
 *
 * @package comestibles
 * @since 0.5
 * @author piro
 */
class BannerImage
{

    /**
     * @var String is the unique_id of model
     */
    protected $unique_id = "";

    /**
     * @var Integer width of the Image
     */
    protected $width = 150;

    /**
     * @var Integer height of the Image
     */
    protected $height = 150;

    /**
     * @var String folder name inside the uploads directory
     */
    protected $folder_images = "banner_image";

    /**
     * @var String name of the default image
     */
    protected $defaultImage;

    /**
     * Constructor of Passport Image
     *
     * UserId is optional, if not given the current user will used
     *
     * @param type $unique_id
     */
    public function __construct($unique_id, $defaultImage = 'default_user')
    {
        $this->unique_id = $unique_id;
        $this->defaultImage = $defaultImage;
    }

    /**
     * Returns the URl of the Modified Passport Image
     *
     * @param String $prefix Prefix of the returned image
     * @return String Url of the banner image
     */
    public function getUrl($prefix = "")
    {

        $cacheId = 0;
        $path = "";

        // Workaround for absolute urls in console applications (Cron)
        if (Yii::app() instanceof CConsoleApplication) {
            $path = Yii::app()->request->getBaseUrl();
        } else {
            $path = Yii::app()->getBaseUrl(true);
        }


        if (file_exists($this->getPath($prefix))) {
            $path .= '/uploads/' . $this->folder_images . '/';
            $path .= $this->unique_id . $prefix;
	        $path .= '.jpg';
        } elseif (is_object(Yii::app()->theme)) {
	        // get default image from theme (if exists)
	        $path = Yii::app()->theme->getFileUrl('/img/' . $this->defaultImage . '.jpg', true);
        } else {
	        $path .= '/img/' . $this->defaultImage;
	        $path .= '.jpg';
        }

        $path .= '?cacheId=' . $cacheId;
        return $path;
    }

    /**
     * Indicates there is a custom banner image
     *
     * @return Boolean is there a banner image
     */
    public function hasImage()
    {
        return file_exists($this->getPath("_org"));
    }

    /**
     * Returns the Path of the Modified Passport Image
     *
     * @param String $prefix for the banner image
     * @return String Path to the banner image
     */
    public function getPath($prefix = "")
    {
        $path = Yii::getPathOfAlias('webroot') . DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR . $this->folder_images . DIRECTORY_SEPARATOR;

        if (!is_dir($path))
            mkdir($path);

        $path .= $this->unique_id;
        $path .= $prefix;
        $path .= ".jpg";

        return $path;
    }

    /**
     * Crops the Original Image
     *
     * @param Int $x
     * @param Int $y
     * @param Int $h
     * @param Int $w
     * @return boolean indicates the success
     */
    public function cropOriginal($x, $y, $h, $w)
    {

        $image = imagecreatefromjpeg($this->getPath('_org'));

        // Create new destination Image
        $destImage = imagecreatetruecolor($this->width, $this->height);

        if (!imagecopyresampled($destImage, $image, 0, 0, $x, $y, $this->width, $this->height, $w, $h)) {
            return false;
        }

        unlink($this->getPath(''));
        imagejpeg($destImage, $this->getPath(''), 100);
    }

    /**
     * Sets a new banner image by given temp file
     *
     * @param mixed $file CUploadedFile or file path
     */
    public function setNew($file)
    {

        if ($file instanceof CUploadedFile) {
            $file = $file->getTempName();
        }

        $this->delete();
        ImageConverter::TransformToJpeg($file, $this->getPath('_org'));
        ImageConverter::Resize($this->getPath('_org'), $this->getPath('_org'), array('width' => 400, 'mode' => 'max'));
        ImageConverter::Resize($this->getPath('_org'), $this->getPath(''), array('width' => $this->width, 'height' => $this->height));
    }

    /**
     * Deletes current banner
     */
    public function delete()
    {
        @unlink($this->getPath());
        @unlink($this->getPath('_org'));
    }

}

?>

<?php
require 'aws/aws-autoloader.php';

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

// AWS Info
define('bucketName', 'techhelper-projects');
define('IAM_KEY', 'AKIAULIDB74YM2QTSIGE');
define('IAM_SECRET', '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');

function uploadToS3Bucket($file, $genFileName = "", $folderName = "Others")
{
  $bucketName = bucketName;
  $outMessage = array();
  try {
    $s3 = S3Client::factory(
      array(
        'credentials' => array(
          'key' => IAM_KEY,
          'secret' => IAM_SECRET
        ),
        'version' => 'latest',
        'region'  => 'ap-south-1'
      )
    );
    $outMessage["isConnected"] = true;
    $outMessage["connectMsg"] = "Connected";
  } catch (Exception $e) {
    $outMessage["isConnected"] = false;
    $outMessage["connectMsg"] = $e->getMessage();
    //die("Error: " . $e->getMessage());
  }

  $file_name = $genFileName;
  if ($genFileName == "") {
    $test1 = explode(".", $file["name"]);
    $extension1 = end($test1);
    $file_name = uniqid(date('Y-m-d-H-i-s') . '_');
    $file_name = $file_name . '-' . $folderName . '.' . $extension1;
  }

  $keyName = "PropCorn/" . $folderName . '/' . $file_name;
  $pathInS3 = 'https://s3.ap-south-1.amazonaws.com/' . $bucketName . '/' . $keyName;

  // Add it to S3
  try {
    if (!file_exists('/tmp/tmpfile')) {
      //echo 3;
      mkdir('/tmp/tmpfile');
    }

    $tempFilePath = '/tmp/tmpfile/' . basename($file['name']);

    $tempFile = fopen($tempFilePath, "w") or die("Error: Unable to open file.");
    echo $tempFile;

    $fileContents = file_get_contents($file['tmp_name']);
    $tempFile = file_put_contents($tempFilePath, $fileContents);

    $s3->putObject(
      array(
        'Bucket' => $bucketName,
        'Key' =>  $keyName,
        'SourceFile' => $tempFilePath,
        'StorageClass' => 'REDUCED_REDUNDANCY',
        //'ACL'   => 'public-read'
      )
    );
    $outMessage["isUploaded"] = true;
    $outMessage["uploadMsg"] = "Uploaded To " . $folderName;
    $outMessage["fileName"] = $file_name;
    $outMessage["keyName"] = $keyName;
    $outMessage["pathInS3"] = $pathInS3;
  } catch (S3Exception $e) {
    $outMessage["uploadMsg"] = $e->getMessage();
    $outMessage["isUploaded"] = false;
    //die('Error:' . $e->getMessage());
  } catch (Exception $e) {
    $outMessage["uploadMsg"] = $e->getMessage();
    $outMessage["isUploaded"] = false;
    //die('Error:' . $e->getMessage());
  }
  return $outMessage;
}
// delete function
function delteFromS3($fileName)
{
  $s3Client = new S3Client([
    'version' => 'latest',
    'region'  => 'ap-south-1',
    'credentials' => [
      'key'    => IAM_KEY,
      'secret' => IAM_SECRET
    ]
  ]);
  $bucketName = bucketName;
  try {
    $params = [
      'Bucket' => $bucketName,
      'Key'    => $fileName,
    ];
    $result = $s3Client->deleteObject($params);
    return $result;
  } catch (AwsException $e) {
    error_log($e->getMessage());
    return false;
  }
}
// delete function
function uploadToS3FromFile($file, $fromPath, $folderName = "other")
{
  $bucketName = bucketName;
  $outMessage = array();

  try {
    $s3 = S3Client::factory(
      array(
        'credentials' => array(
          'key' => IAM_KEY,
          'secret' => IAM_SECRET
        ),
        'version' => 'latest',
        'region'  => 'ap-south-1'
      )
    );
    $outMessage["isConnected"] = true;
    $outMessage["connectMsg"] = "Connected";
  } catch (Exception $e) {
    $outMessage["isConnected"] = false;
    $outMessage["connectMsg"] = $e->getMessage();
    //die("Error: " . $e->getMessage());
  }


  $keyName = "NGO/" . $folderName . '/' . $file;
  $pathInS3 = 'https://s3.ap-south-1.amazonaws.com/' . $bucketName . '/' . $keyName;

  // Add it to S3
  try {

    //$tempFilePath = '/var/www/html/Survey/API/selfie/' . $file;
    $tempFilePath = $fromPath . $file;
    if (file_exists($tempFilePath)) {
      $tempFile = fopen($tempFilePath, "w") or die("Error: Unable to open file.");

      $s3->putObject(
        array(
          'Bucket' => $bucketName,
          'Key' =>  $keyName,
          'SourceFile' => $tempFilePath,
          'StorageClass' => 'REDUCED_REDUNDANCY',
          //'ACL'   => 'public-read'
        )
      );
      $outMessage["isUploaded"] = true;
      $outMessage["uploadMsg"] = "Uploaded To " . $folderName;
      $outMessage["fileName"] = $file;
      $outMessage["tempFilePath"] = $tempFilePath;
      $outMessage["keyName"] = $keyName;
      $outMessage["pathInS3"] = $pathInS3;
    } else {
      $outMessage["isUploaded"] = false;
      $outMessage["uploadMsg"] = "file not uploaded";
    }
  } catch (S3Exception $e) {
    $outMessage["uploadMsg"] = $e->getMessage();
    $outMessage["isUploaded"] = false;
    //die('Error:' . $e->getMessage());
  } catch (Exception $e) {
    $outMessage["uploadMsg"] = $e->getMessage();
    $outMessage["isUploaded"] = false;
    //die('Error:' . $e->getMessage());
  }
  return $outMessage;
}

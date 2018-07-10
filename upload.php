<?php
if (isset($_POST['submit'])) {
	$file = $_FILES['file'];
	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];

	$FileExt = explode('.', $fileName);
	$fileActualExt = strtolwer(end($fileExt));
	$allowed = array('jpg', 'jpeg', 'png', 'pdf', 'psd', 'txt', 'xml', 'html', 'php', 'gif', 'gifv');

	if (in_array($fileActualExt, $allowed)) {
		if ($fileError === 0)
			if ($fileSize < 500000) {
				$fileNameNew = uniqid('', true).".".$fileActualExt;
				$fileDestination = 'uploads/'.$fileNameNew;
				moev_uploaded_file($fileTempName, $fileDestination);
			} else {
				echo "Your file is too big! What are you trying to upload?!";
			}
	} else {
		echo "What file you are trying to upload? I literally let every filetype I know to be uploaded xD";
	}
}
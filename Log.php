<?php 

class Log {
	private $error;
	private $errorCode;
	private $file;
	private $line;
	private $trace;

	function __construct(Throwable $e) {
		$this->error = $e->getMessage();
		$this->errorCode = $e->getCode();
		$this->file = $e->getFile();
		$this->line = $e->getLine();
		$this->trace = $e->getTraceAsString();

		$this->log();
	}

	private function log() {
		// $logDate = date("Y-m-d H-i-s");
		// $logFile = fopen('logs/log' . $logDate .'.txt', 'a');
		$now = DateTime::createFromFormat('U.u', microtime(true));
		$logFile = fopen('logs/log' . $now->format("m-d-Y H:i:s.u") .'.txt', 'a');

		if(flock($logF, LOCK_EX)) {
			fwrite($logFile, $logDate);
			fwrite($logFile, 'error text: ' . $this->error);
			fwrite($logFile, 'error code: ' . $this->errorCode);
			fwrite($logFile, 'in file: ' . $this->file);
			fwrite($logFile, 'in line: ' . $this->line);
			fwrite($logFile, 'trace: ' . $this->trace);
			flock($logFile, LOCK_UN);
		}
		fclose($logFile);

	}

}


?>
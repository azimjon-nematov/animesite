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
		$now = DateTime::createFromFormat('U.u', microtime(true));
		$logFile = fopen('logs/log' . $now->format("Y-m-d") .'.txt', 'a');

		if(flock($logFile, LOCK_EX)) {
			fputs($logFile, $now->format("Y-m-d H-i-s.u"));
			fputs($logFile, "\nerror text: " . $this->error);
			fputs($logFile, "\nerror code: " . $this->errorCode);
			fputs($logFile, "\nin file: " . $this->file);
			fputs($logFile, "\nin line: " . $this->line);
			fputs($logFile, "\ntrace: " . $this->trace);
			fputs($logFile, "\n==========================================\n");
			flock($logFile, LOCK_UN);
		}
		fclose($logFile);
	}

}


?>
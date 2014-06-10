<?php

namespace util\importer\drugdataimporter;

/**
 * Description of ProcessInfoDto
 *
 * @author cjscript
 */
class ProcessInfoDto
{

    private $loops;
    private $successCount;
    private $failureCount;

    public function getLoops()
    {
        return $this->loops;
    }

    public function getSuccessCount()
    {
        return $this->successCount;
    }

    public function getFailureCount()
    {
        return $this->failureCount;
    }

    public function setLoops($loops)
    {
        $this->loops = $loops;
    }

    public function setSuccessCount($successCount)
    {
        $this->successCount = $successCount;
    }

    public function setFailureCount($failureCount)
    {
        $this->failureCount = $failureCount;
    }

    public function __construct()
    {
        
    }

}

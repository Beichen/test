<?php

/**
 * TianPostTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class TianPostTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object TianPostTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('TianPost');
    }
	
	public function getByDate($date)
	{
		$q = $this->createQuery('p')
				->where('p.release_date=?', $date);
		
		return $q->execute();
	} //getByDate()
}
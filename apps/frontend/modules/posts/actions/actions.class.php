<?php

/**
 * posts actions.
 *
 * @package    china_blog_test
 * @subpackage posts
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class postsActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
	// exit('here');
    $this->test = 'hellow LYC';
	
	// $date = time();
	// exit();
	$now_str = date('Y-n-j');
	// exit($now_str);
	$query = TianPostTable::getInstance()->createQuery('p')
				->where('p.release_date=?', $now_str);
	
	$posts = $query->execute();
	$this->posts = $posts;
	// exit($posts[0]->getContent());
	
	// $date = DateTime::createFromFormat('j-M-Y', );	//j就是不加0的d
	// echo $date->format('Y-m-d');
	
  } //executeIndex()

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new tianPostForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new tianPostForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($tian_post = Doctrine_Core::getTable('tianPost')->find(array($request->getParameter('id'))), sprintf('Object tian_post does not exist (%s).', $request->getParameter('id')));
    $this->form = new tianPostForm($tian_post);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($tian_post = Doctrine_Core::getTable('tianPost')->find(array($request->getParameter('id'))), sprintf('Object tian_post does not exist (%s).', $request->getParameter('id')));
    $this->form = new tianPostForm($tian_post);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($tian_post = Doctrine_Core::getTable('tianPost')->find(array($request->getParameter('id'))), sprintf('Object tian_post does not exist (%s).', $request->getParameter('id')));
    $tian_post->delete();

    $this->redirect('posts/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $tian_post = $form->save();

      $this->redirect('posts/edit?id='.$tian_post->getId());
    }
  }
}

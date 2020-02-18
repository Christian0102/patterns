<?php
class Post
{
	protected $title;
	
	public function setTitle($title)
	{
		$this->title = $title;
	}
	
	public function getTitle()
	{
		return $this->title;
	}
}


class PostContainer implements IteratorAggregate
{
	protected $posts;
	
	protected $archiveCount;
	
	public function __construct(array $posts, $archiveCount)
	{
		$this->posts = $posts;
		$this->archiveCount = $archiveCount;
	}
	public function getArchiveCount()
	{
		return $this->archiveCount;
	}
	
	public function getIterator()
	{
		return new ArrayIterator($this->posts);
	}
}




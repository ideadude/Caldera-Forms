<?php


namespace calderawp\calderaforms\Tests\Integration\Features;


use calderawp\calderaforms\cf2\Jobs\Scheduler;
use calderawp\calderaforms\cf2\Services\QueueSchedulerService;
use calderawp\calderaforms\cf2\Services\QueueService;
use calderawp\calderaforms\Tests\Integration\TestCase;
use WP_Queue\Queue;

class ContainerServicesAreLoadedTest extends TestCase
{

	protected $container;
	public function setUp()
	{
		$this->container = false;
		parent::setUp(); // TODO: Change the autogenerated stub
	}

	public function testDidAction(){
		$this->assertEquals( 1, did_action( 'caldera_forms_core_init'));
		$this->assertEquals( 1,did_action( 'caldera_forms_v2_init'));
	}
	/** @group now */
	public function testHasQueueService(){
		$this->assertInstanceOf( Queue::class, caldera_forms_get_v2_container()->getService(QueueService::class) );
	}

	/** @group now */
	public function testHasQueueSchedulerService(){
		$this->assertInstanceOf( Scheduler::class, caldera_forms_get_v2_container()->getService(QueueSchedulerService::class) );
	}
}

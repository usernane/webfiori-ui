<?php
namespace phpStructs\tests\dataStructures;
use PHPUnit\Framework\TestCase;
use phpStructs\tests\AnyObject;
use phpStructs\LinkedList;
/**
 * Description of LinkedListTest
 *
 * @author Ibrahim
 */
class LinkedListTest extends TestCase{
    /**
     * @test
     */
    public function testConstructor00() {
        $list = new LinkedList();
        $this->assertEquals(-1,$list->max());
    }
    /**
     * @test
     */
    public function testConstructor01() {
        $list = new LinkedList('33');
        $this->assertEquals(-1,$list->max());
    }
    /**
     * @test
     */
    public function testConstructor02() {
        $list = new LinkedList(33);
        $this->assertEquals(33,$list->max());
    }
    /**
     * @test
     */
    public function testSize00() {
        $list = new LinkedList();
        $null = null;
        $list->add($null);
        $this->assertEquals(1,$list->size());
        $s = 'Something';
        $list->add($s);
        $this->assertEquals(2,$list->size());
        $number = 44;
        $list->add($number);
        $this->assertEquals(3,$list->size());
        $list->removeFirst();
        $this->assertEquals(2,$list->size());
        $list->add($null);
        $this->assertEquals(3,$list->size());
        $another = 'Another Thing';
        $list->add($another);
        $this->assertEquals(4,$list->size());
        $more = 'More Things';
        $list->add($more);
        $this->assertEquals(5,$list->size());
        $obj = new AnyObject(5, 'Test');
        $list->add($obj);
        $this->assertEquals(6,$list->size());
        $list->removeLast();
        $this->assertEquals(5,$list->size());
        $list->remove(3);
        $this->assertEquals(4,$list->size());
        $list->remove(100);
        $this->assertEquals(4,$list->size());
        $something = 'Something';
        $list->removeElement($something);
        $this->assertEquals(3,$list->size());
        $list->removeElement($obj);
        $this->assertEquals(3,$list->size());
        $list->clear();
        $this->assertEquals(0,$list->size());
    }
    /**
     * @test
     */
    public function testSize01() {
        $list = new LinkedList(3);
        $this->assertEquals(3,$list->max());
        $null = null;
        $list->add($null);
        $this->assertEquals(1,$list->size());
        $s = 'Something';
        $list->add($s);
        $this->assertEquals(2,$list->size());
        $number = 44;
        $list->add($number);
        $this->assertEquals(3,$list->size());
        $list->removeFirst();
        $this->assertEquals(2,$list->size());
        $list->add($null);
        $this->assertEquals(3,$list->size());
        $another = 'Another Thing';
        $list->add($another);
        $this->assertEquals(3,$list->size());
        $more = 'More Things';
        $list->add($more);
        $this->assertEquals(3,$list->size());
        $obj = new AnyObject(5, 'Test');
        $list->add($obj);
        $this->assertEquals(3,$list->size());
        $list->removeLast();
        $this->assertEquals(2,$list->size());
        $list->remove(3);
        $this->assertEquals(2,$list->size());
        $list->remove(0);
        $this->assertEquals(1,$list->size());
        $something = 'Something';
        $list->removeElement($something);
        $this->assertEquals(1,$list->size());
        $list->removeFirst();
        $this->assertEquals(0,$list->size());
        $list->add($null);
        $this->assertEquals(1,$list->size());
        $list->add($s);
        $this->assertEquals(2,$list->size());
        $list->add($number);
        $this->assertEquals(3,$list->size());
        $list->removeFirst();
        $this->assertEquals(2,$list->size());
        $list->add($null);
        $this->assertEquals(3,$list->size());
        $list->add($another);
        $this->assertEquals(3,$list->size());
        $list->add($more);
        $this->assertEquals(3,$list->size());
        $list->add($obj);
        $this->assertEquals(3,$list->size());
        $list->removeLast();
        $this->assertEquals(2,$list->size());
        $list->remove(3);
        $this->assertEquals(2,$list->size());
        $list->remove(0);
        $this->assertEquals(1,$list->size());
        $list->removeElement($something);
        $this->assertEquals(1,$list->size());
        $list->removeFirst();
        $this->assertEquals(0,$list->size());
    }
    /**
     * @test
     */
    public function testSize02() {
        $list = new LinkedList();
        $list->removeFirst();
        $this->assertEquals(0,$list->size());
        $list->removeLast();
        $this->assertEquals(0,$list->size());
        $list->remove(0);
        $this->assertEquals(0,$list->size());
        $list->removeElement($list);
        $this->assertEquals(0,$list->size());
    }
    /**
     * @test
     */
    public function testAdd00() {
        $list = new LinkedList(1);
        $el = 'An element.';
        $this->assertTrue($list->add($el));
        $el2 = 'Another one.';
        $this->assertFalse($list->add($el2));
        $list->removeFirst();
        $this->assertTrue($list->add($el2));
        $this->assertFalse($list->add($el));
        $list->removeLast();
        $this->assertTrue($list->add($el));
        $list->remove(3);
        $this->assertFalse($list->add($el2));
        $list->remove(0);
        $this->assertTrue($list->add($el2));
    }
    /**
     * @test
     */
    public function testAdd01() {
        $list = new LinkedList(7);
        for($x = 0 ; $x < $list->max() ; $x++){
            $xEl = 'El #'.$x;
            $this->assertTrue($list->add($xEl));
        }
        $el = 'An element.';
        $el2 = 'Another one.';
        $this->assertFalse($list->add($el));
        $this->assertFalse($list->add($el2));
        $list->removeFirst();
        $this->assertTrue($list->add($el2));
        $this->assertFalse($list->add($el));
        $list->removeLast();
        $this->assertTrue($list->add($el));
        $list->remove(3);
        $this->assertTrue($list->add($el2));
        $list->remove(0);
        $this->assertTrue($list->add($el2));
        $this->assertFalse($list->add($el));
        $list->clear();
        for($x = 0 ; $x < $list->max() ; $x++){
            $xEl = 'El #'.$x;
            $this->assertTrue($list->add($xEl));
        }
        $this->assertFalse($list->add($el));
        $this->assertFalse($list->add($el2));
        $list->removeFirst();
        $this->assertTrue($list->add($el2));
        $this->assertFalse($list->add($el));
    }
    /**
     * @test
     */
    public function testRemoveFirst() {
        $list = new LinkedList();
        $this->assertNull($list->removeFirst());
        $el01 = 'Element #0';
        $el02 = 'Element #2';
        $el03 = 'Element #3';
        $el04 = 'Element #4';
        $el05 = 'Element #5';
        $list->add($el01);
        $this->assertEquals($el01,$list->removeFirst());
        $this->assertNull($list->removeFirst());
        
        $list->add($el01);
        $list->add($el02);
        $this->assertEquals($el01,$list->removeFirst());
        $this->assertEquals($el02,$list->removeFirst());
        $this->assertNull($list->removeFirst());
        $list->add($el01);
        $list->add($el02);
        $list->add($el03);
        $list->add($el04);
        $this->assertEquals($el01,$list->removeFirst());
        $this->assertEquals($el02,$list->removeFirst());
        $this->assertEquals($el03,$list->removeFirst());
        $this->assertEquals($el04,$list->removeFirst());
        $this->assertNull($list->removeFirst());
        $list->add($el01);
        $list->add($el02);
        $list->add($el03);
        $list->add($el04);
        $list->add($el05);
        $list->remove(2);
        $this->assertEquals($el01,$list->removeFirst());
        $this->assertEquals($el02,$list->removeFirst());
        $this->assertEquals($el04,$list->removeFirst());
        $this->assertEquals($el05,$list->removeFirst());
        $this->assertNull($list->removeFirst());
        $list->add($el01);
        $list->add($el02);
        $list->add($el03);
        $list->add($el04);
        $list->add($el05);
        $list->removeElement($el04);
        $this->assertEquals($el01,$list->removeFirst());
        $this->assertEquals($el02,$list->removeFirst());
        $this->assertEquals($el03,$list->removeFirst());
        $this->assertEquals($el05,$list->removeFirst());
        $this->assertNull($list->removeFirst());
    }
    /**
     * @test
     */
    public function testRemoveLast() {
        $list = new LinkedList();
        $this->assertNull($list->removeLast());
        $el01 = 'Element #0';
        $el02 = 'Element #2';
        $el03 = 'Element #3';
        $el04 = 'Element #4';
        $el05 = 'Element #5';
        $list->add($el01);
        $this->assertEquals($el01,$list->removeLast());
        $this->assertNull($list->removeLast());
        
        $list->add($el01);
        $list->add($el02);
        $this->assertEquals($el02,$list->removeLast());
        $this->assertEquals($el01,$list->removeLast());
        $this->assertNull($list->removeLast());
        $list->add($el01);
        $list->add($el02);
        $list->add($el03);
        $list->add($el04);
        $this->assertEquals($el04,$list->removeLast());
        $this->assertEquals($el03,$list->removeLast());
        $this->assertEquals($el02,$list->removeLast());
        $this->assertEquals($el01,$list->removeLast());
        $this->assertNull($list->removeLast());
        $list->add($el01);
        $list->add($el02);
        $list->add($el03);
        $list->add($el04);
        $list->add($el05);
        $list->remove(2);
        $this->assertEquals($el05,$list->removeLast());
        $this->assertEquals($el04,$list->removeLast());
        $this->assertEquals($el02,$list->removeLast());
        $this->assertEquals($el01,$list->removeLast());
        $this->assertNull($list->removeLast());
        $list->add($el01);
        $list->add($el02);
        $list->add($el03);
        $list->add($el04);
        $list->add($el05);
        $list->removeElement($el04);
        $this->assertEquals($el05,$list->removeLast());
        $this->assertEquals($el03,$list->removeLast());
        $this->assertEquals($el02,$list->removeLast());
        $this->assertEquals($el01,$list->removeLast());
        $this->assertNull($list->removeLast());
    }
    /**
     * @test
     */
    public function testRemoveByIndex00() {
        $list = new LinkedList();
        $el00 = 'Element #0';
        $el01 = 'Element #1';
        $el02 = 'Element #2';
        $el03 = 'Element #3';
        $list->add($el00);
        $this->assertEquals($el00,$list->remove(0));
        $this->assertNull($list->remove(0));
        $list->add($el00);
        $list->add($el01);
        $this->assertEquals($el00,$list->remove(0));
        $this->assertEquals($el01,$list->remove(0));
        $this->assertNull($list->remove(0));
        $list->add($el00);
        $list->add($el01);
        $list->add($el02);
        $this->assertEquals($el00,$list->remove(0));
        $this->assertEquals($el01,$list->remove(0));
        $this->assertEquals($el02,$list->remove(0));
        $this->assertNull($list->remove(0));
        $list->add($el00);
        $list->add($el01);
        $list->add($el02);
        $list->add($el03);
        $this->assertEquals($el00,$list->remove(0));
        $this->assertEquals($el01,$list->remove(0));
        $this->assertEquals($el02,$list->remove(0));
        $this->assertEquals($el03,$list->remove(0));
        $this->assertNull($list->remove(0));
    }
    /**
     * @test
     */
    public function testRemoveByIndex01() {
        $list = new LinkedList();
        $el00 = 'Element #0';
        $el01 = 'Element #1';
        $el02 = 'Element #2';
        $el03 = 'Element #3';
        $list->add($el00);
        $this->assertNull($list->remove(1));
        $this->assertEquals($el00,$list->remove(0));
        $list->add($el00);
        $list->add($el01);
        $this->assertEquals($el01,$list->remove(1));
        $this->assertNull($list->remove(1));
        $this->assertEquals($el00,$list->remove(0));
        $list->add($el00);
        $list->add($el01);
        $list->add($el02);
        $this->assertEquals($el01,$list->remove(1));
        $this->assertEquals($el02,$list->remove(1));
        $this->assertNull($list->remove(1));
        $this->assertEquals($el00,$list->remove(0));
        $list->add($el00);
        $list->add($el01);
        $list->add($el02);
        $list->add($el03);
        $this->assertEquals($el01,$list->remove(1));
        $this->assertEquals($el02,$list->remove(1));
        $this->assertEquals($el03,$list->remove(1));
        $this->assertEquals($el00,$list->remove(0));
        $this->assertNull($list->remove(0));
    }
    /**
     * @test
     */
    public function testRemoveByIndex02() {
        $list = new LinkedList();
        $el00 = 'Element #0';
        $el01 = 'Element #1';
        $el02 = 'Element #2';
        $el03 = 'Element #3';
        $list->add($el00);
        $this->assertNull($list->remove(2));
        $this->assertNull($list->remove(1));
        $this->assertEquals($el00,$list->remove(0));
        $this->assertNull($list->remove(0));
        $list->add($el00);
        $list->add($el01);
        $this->assertNull($list->remove(2));
        $this->assertEquals($el01,$list->remove(1));
        $this->assertNull($list->remove(1));
        $this->assertEquals($el00,$list->remove(0));
        $this->assertNull($list->remove(0));
        $list->add($el00);
        $list->add($el01);
        $list->add($el02);
        $this->assertEquals($el02,$list->remove(2));
        $this->assertNull($list->remove(2));
        $this->assertEquals($el01,$list->remove(1));
        $this->assertNull($list->remove(1));
        $this->assertEquals($el00,$list->remove(0));
        $list->add($el00);
        $list->add($el01);
        $list->add($el02);
        $list->add($el03);
        $this->assertEquals($el02,$list->remove(2));
        $this->assertEquals($el03,$list->remove(2));
        $this->assertNull($list->remove(2));
        $this->assertEquals($el01,$list->remove(1));
        $this->assertNull($list->remove(1));
        $this->assertEquals($el00,$list->remove(0));
        $this->assertNull($list->remove(0));
    }
    /**
     * @test
     */
    public function testCount00() {
        $list = new LinkedList();
        for($x = 0 ; $x < 10 ; $x++){
            $el = 'Element #'.$x;
            $list->add($el);
        }
        for($x = 0 ; $x < 10 ; $x++){
            $el = 'Element #'.$x;
            $this->assertEquals(1,$list->count($el));
        }
        $new = 'Element #9';
        $list->add($new);
        $this->assertEquals(2,$list->count($new));
        $doesNotExist = 'Not in list';
        $this->assertEquals(0,$list->count($doesNotExist));
        $list->removeElement($new);
        $this->assertEquals(1,$list->count($new));
        $list->removeElement($new);
        $this->assertEquals(0,$list->count($new));
        
        $el = $list->get(3);
        $this->assertEquals(1,$list->count($el));
        $list->add($el);
        $this->assertEquals(2,$list->count($el));
        $list->clear();
        $this->assertEquals(0,$list->count($el));
    }
    /**
     * @test
     */
    public function testCount01() {
        $list = new LinkedList();
        for($x = 0 ; $x < 10 ; $x++){
            $el = new AnyObject($x, 'Element #'.$x);
            $list->add($el);
        }
        for($x = 0 ; $x < 10 ; $x++){
            $el = new AnyObject($x, 'Element #'.$x);
            $this->assertEquals(0,$list->count($el));
        }
        $new = new AnyObject(5, 'Element #5');
        $list->add($new);
        $this->assertEquals(1,$list->count($new));
        $el = $list->get(3);
        $this->assertEquals(1,$list->count($el));
        $list->add($el);
        $this->assertEquals(2,$list->count($el));
        $list->clear();
        $this->assertEquals(0,$list->count($el));
    }
}
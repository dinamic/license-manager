<?php
namespace Doctrine\Bundle\LicenseManagerBundle\Tests;

use Doctrine\Bundle\LicenseManagerBundle\Entity\Commit;

class CommitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider changeLines
     * @param $changeLine
     * @param $files
     * @param $insertions
     * @param $deletions
     */
    public function testParseChangeLine($changeLine, $files, $insertions, $deletions)
    {
        $commit = new Commit("abcdefg", null, null, " 3 files changed, 6 insertions(+), 5 deletions(-)");

        $this->assertEquals(3, $commit->getFilesChanged());
        $this->assertEquals(6, $commit->getInsertions());
        $this->assertEquals(5, $commit->getDeletions());
    }

    public static function changeLines()
    {
        return array(
            array(" 3 files changed, 6 insertions(+), 5 deletions(-)", 3, 6, 5),
            array("2 files changed, 170 insertions(+)", 2, 170, 0),
            array("1 file changed, 1 insertion(+), 1 deletion(-)", 1, 1, 1),
        );
    }
}


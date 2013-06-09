<?php
// vim: foldmethod=marker
/**
 * Ethna_Plugin_Handle_AddTest.php
 * 
 * @author  BoBpp <bobpp@users.sourceforge.jp>
 * @license http://www.opensource.org/licenses/bsd-license.php The BSD License
 * @package Ethna
 * @version $Id$
 */

// {{{ Ethna_Plugin_Handle_AddTest
/**
 * Ethna_Handle which generates Normal Test Case
 * 
 * @author BoBpp <bobpp@users.sourceforge.jp>
 * @package Ethna
 */
class Ethna_Plugin_Handle_AddTest extends Ethna_Plugin_Handle
{
    /**
     * ���ޥ�ɤγ��פ��֤�
     * 
     * @access protected
     * @return string ���ޥ�ɳ���
     */
    function getDescription()
    {
         return <<<EOS
Create Normal UnitTestCase
    (If you want action(view) test, use add-[action|view]-test):
    {$this->id} [-b|--basedir=dir] [-s|--skelfile=file] [name]

EOS;
    }
     
     /**
      * ���ޥ�ɤλ���ˡ���֤�
      * 
      * @access protected
      * @return string ���ޥ�ɤλ�����ˡ
      */
    function getUsage()
    {
        return <<<EOS
ethna {$this->id} [-b|--basedir=dir] [-s|--skelfile=file] [name]

EOS;
    }
     
    /**
     * ���ޥ�ɤμ�����ʬ
     * 
     * �ƥ��ȥ������ե�����������Ԥ�
     * 
     * @access protected
     * @return mixed �¹Է��: TRUE: ����
     *                         Ethna_Error: ���顼
     */
    function &perform()
    {
        // get args. 
        $r = $this->_getopt(array('basedir=','skelfile='));
        if (Ethna::isError($r)) {
            return $r;
        }
        list($optlist, $arglist) = $r;
        
        $num = count($arglist);
        if ($num < 1 || $num > 3) {
            return Ethna::raiseError("Invalid Arguments.");
        }
        
        if (isset($optlist['skelfile'])) {
            $skelfile = end($optlist['skelfile']);
        } else {
            $skelfile = null;
        }
 
        $baseDir = isset($optlist['basedir']) ? $optlist['basedir'] : getcwd();
        $name = $arglist[0];
        
        $r =& Ethna_Generator::generate(
            'Test', $baseDir, $skelfile, $name
        );
        if (Ethna::isError($r)) {
            return $r;
        }
        
        $true = true;
        return $true;
    }
}
// }}}


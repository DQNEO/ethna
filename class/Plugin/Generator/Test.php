<?php
// vim: foldmethod=marker
/**
 * Ethna_Plugin_Generator_Test.php
 * 
 * @author BoBpp <bobpp@users.sourceforge.jp>
 * @license http://www.opensource.org/licenses/bsd-license.php The BSD License
 * @package Ethna
 * @version $Id$
 */
 
// {{{ Ethna_Plugin_Generator_Test
/**
 * Normal Test Case Generator.
 * 
 * @author BoBpp <bobpp@users.sourceforge.jp>
 * @package Ethna
 */
class Ethna_Plugin_Generator_Test extends Ethna_Plugin_Generator
{
    /**
     * �ե�����������Ԥ�
     * 
     * @access public
     * @param string $skelfile ������ȥ�ե�����̾
     * @param string $name     �ƥ��ȥ�����̾
     * @return mixed TRUE; OK
     *               Ethna_Error: ���顼ȯ��
     */
    function &generate($skelfile, $name)
    {
        // Controller�����
        $ctl =& $this->ctl;
        
        // �ƥ��Ȥ���������ǥ��쥯�ȥ꤬���뤫��
        // �ʤ���� app/test ���ǥե���ȡ�
        $dir = $ctl->getDirectory('test');
        if ($dir === null) {
            $dir = $ctl->getDirectory('app') . "/" . "test";
        }
        
        // �ե�����̾����
        $file = preg_replace('/_(.)/e', "'/' . strtoupper('\$1')", ucfirst($name)) . "Test.php";
        $generatePath = "$dir/$file";
        
        // ������ȥ����
        $skelton = (!empty($skelfile))
                 ? $skelfile
                 : "skel.test.php";
        
        // �ޥ�������
        $macro = array();
        $macro['project_id'] = ucfirst($ctl->getAppId());
        $macro['file_path'] = $file;
        $macro['name'] = preg_replace('/_(.)/e', "strtoupper('\$1')", ucfirst($name));
        
        $userMacro = $this->_getUserMacro();
        $macro = array_merge($macro, $userMacro);
        
        // ����
        Ethna_Util::mkdir(dirname($generatePath), 0755);
        if (file_exists($generatePath)) {
            printf("file [%s] already exists -> skip\n", $generatePath);
        } else if ($this->_generateFile($skelton, $generatePath, $macro) == false) {
            printf("[warning] file creation failed [%s]\n", $generatePath);
        } else {
            printf("test script(s) successfully created [%s]\n", $generatePath);
        }

        $true = true;
        return $true;
    }
}
// }}}


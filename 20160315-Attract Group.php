<?php
/**
 * �������� ������� ��� ���������� �� ��������� PHP-������������
 *
 * ���� ������������ ����� ������ ��� ���������� ��������� �������. ��� �����������
 * ������ ������ ���� ����������� ��������������� �����. �������� ��������������
 * ����������� ������� �����������.
 *
 * ��� ������ ��������������� ���������� ����������� PSR (http://www.php-fig.org/psr/)
 * � �������� ��� ��������� �������������� ��� ���������� ������ error_reporting=E_ALL.
 *
 * ����� ���������� ���� ����� ���� ������ ���� ������������ � ��������� ������:
 * <Date>-<LastName>.php
 *
 * ��������, 20160309-Ivanov.php
 *
 * ��������!
 *     - �� ���������� ������� �� �� ������ ������� ����� ����-���� ����.
 *     - ���� ������ ��������� ������ �����.
 *
 * @version   20160309
 */
class AttractGroupCandidate {

    /**
     * ������� 1
     *
     * �� �������� ������� ������� ��� ��������, ������� �������� �������� �� �������.
     *
     * ��� �������� �������:
     * 6, 2, 7, 1, 3, 4, 5
     *
     * ������� �������� �����:
     * 4
     *
     * �������������, �� �������� ������� ������� ��� ��������, ������� ������ 4 � ��������:
     * 6, 7, 4, 5
     *
     * @param  array    $list ������� ������
     * @return array          ������ � ���������������� ����������
     */
    public function task1($list) {
        //���������� ��� ��������
        $elem_sum = 0;
        foreach($list as $item)
            $elem_sum += $item;

        //������� �������
        $average = $elem_sum / count($list);

        //�������� ������ - ���������
        $result = array();
        foreach($list as $item)
            if($item >= $average)
                $result[] = $item;

        return $result;
    }


    /**
     * ������� 2
     *
     * �������� �������, �������������� �������� ������. �� ���� ������� ��������� �������� ������. ����� ����������� �� ���������� �������:
     *
     * - ���� ����� ������ �� ��������� 500.00, �� ����� ���������� 5% �� ���
     * - ���� ����� �� ��������� 750.00, �� ����� ���������� 5% �� ������ 500.00 � 10% �� �������
     * - ���� ����� �� ��������� 1500.00, �� � ������ 500.00 ����� 5%, �� 500.00 �� 750.00 10% � 12.5% � ����, ��� ��������� 750.00
     * - ���� ����� ������ 1500.00, �� �� 1500.00 ��������� �� ���������� ���� �������, � �� �����, ��� ������ ����� 15%
     *
     * ��������, ���� ����� ����� 680.00, �� ������� ������ ������� 43.00.
     *
     * @param  float   $income  �������� ������
     * @return float            ����� ������
     */
    public function task2($income) {
        //������ �� ����������� ��� ���������� ������ ���� ����������� ������ � �� ������
        $persents = array(0.15, 0.125, 0.1, 0.05);
        $limits = array(1500, 750, 500, 0);

        $result = 0;

        foreach($limits as $key => $value){
            if($income > $value){
                $result += ($income - $value) * $persents[$key];
                $income -= $income - $value;
            }
        }

        return $result;
    }

    /**
     * ������� 3
     *
     * ��������, ������������� �� ������� ��������� ���������� ������� ������������� � ������� �����������.
     *
     * ��������, ��� ������� �������:
     * 1 2 3 4
     * 5 6 7 8
     * 9 0 3 2
     * 5 2 4 2
     *
     * ������ ���� ��������� ���������:
     * 1 2 3 4
     * 5 2 7 8
     * 9 0 3 2
     * 5 2 4 6
     *
     * @param  array $matrix  ���������� �������
     * @return array          ������� � ��������������� ������� ����������
     */
    public function task3($matrix) {
        //�������� ������ ��� ����������
        $arr = array();
        for($i = 0; $i < count($matrix); $i++)
            $arr[] = $matrix[$i][$i];

        //���������
        sort($arr);

        //���������
        for($i = 0; $i < count($matrix); $i++)
            $matrix[$i][$i] = $arr[$i];

        return $matrix;
    }


    /**
     * ������� 4
     *
     * ������������ ���������� ������, ������������ ��� ������ ������������� ������� �������� �� �����������, �������
     * � �������� ������ �������� ������� ��������� ������. �� ���������� ����� ���� ������� ��������� �� ��������� �
     * �������� ��������� � �������� �����������.
     *
     * ��������, ��� ������� �������:
     *  1  2  3  4
     *  5  6  7  8
     *  9 10 11 12
     *
     * ������ ���� ��������� ���������:
     * 1, 2, 3, 4, 8, 7, 6, 5, 9, 10, 11, 12
     *
     * @param  array $matrix  ������� ������������� �������
     * @return array          ���������� ������
     */
    public function task4($matrix) {
        $result = array();

        $direction = true;
        $i = 0;
        foreach($matrix as $arr){

            while(isset($arr[$i])){
                $result[] = $arr[$i];
                $i = $direction ? ++$i : --$i;
            }

            $direction = !$direction;
            $i = $direction ? ++$i : --$i;
        }

        return $result;
    }
}
?>
<?php

namespace backend\libs;

/**
 * Excel 导出与导入，依赖PHPExcel
 * @package backend\libs
 */
use Yii;
use yii\web\UploadedFile;

class Excel
{
    /**
     * @var object  PHPExcel对象
     */
    private $excel;

    /**
     * @var string Excel文件名称
     */
    private $filename;

    /**
     * 构造
     * @param string $filename
     */
    public function __construct($filename = '导出Excel')
    {
        $this->excel = new \PHPExcel();
        $this->filename = $filename;
    }

    /**
     * 载入数据到excel
     *
     * @param $heads array 标题
     * @param $data  array 数据
     * @param string $sheetname 标签名
     */
    public function load($heads, $data, $sheetname = null)
    {
        $sheet = $this->excel->getActiveSheet();

        $colCount = count($heads);
        $rowCount = count($data);
        $formCol = 65; //A
        $widthArr = array();
        //表头
        for ($col = 0; $col < $colCount; $col++) {
            $col_char = chr($formCol + $col);
            $xy = $col_char . '1';
            $val = $heads[$col];
            $widthArr[$col_char] = $this->getlen($val);

            $sheet->setCellValue($xy, $val);
            $sheet->getStyle($xy)->getFont()->setBold(true);
            $sheet->getStyle($xy)->getAlignment()
                ->setHorizontal('center');
        }
        //内容
        for ($row = 2; $row < $rowCount + 2; $row++) {
            $step = 0;
            foreach ($data[$row - 2] as $key => $value) {
                $col = chr($formCol + $step);
                $width = $this->getlen($value);
                if ($widthArr[$col] < $width) {
                    $widthArr[$col] = $width;
                }
                $xy = $col . $row;
                $sheet->setCellValueExplicit($xy, strval($value), \PHPExcel_Cell_DataType::TYPE_STRING);
                $step++;
            }
        }
        //修改列宽
        foreach ($widthArr as $col => $width) {
            $sheet->getColumnDimension($col)->setWidth($width * 1.2);
        }
        //设置sheet name
        if ($sheetname != null) {
            $sheet->setTitle($sheetname);
        }
    }


    /**
     * 输出excel
     */
    public function export()
    {
        Yii::$app->response->setDownloadHeaders($this->filename . '.xls');
    }


    /**
     * excel 数据导入
     * @return array
     */
    public static function import()
    {
        $filename = self::getFileName();
        if (!$filename) {
            return [];
        }

        $objReader = \PHPExcel_IOFactory::createReaderForFile($filename);
        //忽略单元格格式
        $objReader->setReadDataOnly(true);
        //以数组的形式返回表格数据
        return $objReader->load($filename)->getActiveSheet()->toArray(null, true, true, true);
    }

    /**
     * 获取并保存上传的Excel
     * @return bool|string
     */
    public static function getFileName()
    {
        $file = UploadedFile::getInstanceByName('file');
        //没找到上传文件
        if (!$file) return false;
        //不是Excel文件
        $ext = $file->getExtension();
        if (!in_array($ext, ['xlsx', 'xls'])) {
            return false;
        }
        //保存文件到目录
        $rootPath = yii::$app->params['filePath'];
        $filename = time() . rand(1000, 9999) . "." . $ext;
        $dir = date('Y-m', time());
        $rootPath = $rootPath . $dir . "/";

        if (!file_exists($rootPath)) {
            mkdir($rootPath, 0777);
        }
        if ($file->saveAs($rootPath . $filename, false)) {
            return $rootPath . $filename;
        } else {
            return false;
        }
    }
}
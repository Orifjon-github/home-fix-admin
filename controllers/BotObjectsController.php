<?php

namespace app\controllers;

use app\models\Partners;
use app\models\PartnersSearch;
use app\services\HelperService;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Html;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Yii;
use yii\web\Controller;
use yii\web\Response;


class BotObjectsController extends Controller
{
    public function actionIndex(): string
    {
        return HelperService::index($this, new PartnersSearch());
    }

    public function actionView($id): string
    {
        return HelperService::viewModel($this, new Partners(), $id);
    }

    public function actionCreate(): Response|string
    {
        return HelperService::createModel($this, new Partners(), 'icon');
    }

    public function actionUpdate($id): Response|string
    {
        return HelperService::updateModel($this, new Partners(), $id, 'icon');
    }

    public function actionDelete($id): Response
    {
        HelperService::findModel(new Partners(), $id)->delete();

        return $this->redirect(['index']);
    }

    public function actionEnable($id): Response
    {
        $model = HelperService::findModel(new Partners(), $id);
        HelperService::changeEnableDisable($model);
        return $this->redirect('index');
    }

    public function actionExcel()
    {

        $htmlContent = file_get_contents(Yii::getAlias('@webroot/table.html'));

        $spreadsheet = new Spreadsheet();

        $reader = new Html();
        $reader->loadFromString($htmlContent, $spreadsheet);


        $directory = Yii::getAlias('@webroot/uploads/reports');

        $fileName = 'Coffee_Issimo_' . time() . '.xlsx';
        $filePath = $directory . '/' . $fileName;

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save($filePath);

        return Yii::$app->response->sendFile($filePath)->send();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->mergeCells('A1:J1');
        $sheet->setCellValue('A1', 'Акт об осмотре');
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->setCellValue('B2', 'Название компании');
        $sheet->getStyle('B2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->mergeCells('C2:G2');
        $sheet->setCellValue('C2', 'Fish and Bread');

        $sheet->setCellValue('B3', 'Цель осмотра');
        $sheet->getStyle('B3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->mergeCells('C3:L3');
        $sheet->setCellValue('C3', 'Полный осмотр и диагностика электропроводки выдвижного зонта');

        $sheet->setCellValue('B4', 'Общие сведения об осмотре:');
        $sheet->getStyle('B4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->mergeCells('C4:L4');
        $sheet->setCellValue('C4', 'Осмотрели проводку. Лед лампы');

        $sheet->setCellValue('A6', '№');
        $sheet->setCellValue('B6', 'Наименование');
        $sheet->setCellValue('C6', 'кол-во');
        $sheet->setCellValue('D6', 'Фото');
        $sheet->setCellValue('E6', 'Описание');
        $sheet->setCellValue('F6', 'время выполнения');
        $sheet->setCellValue('G6', 'расходный материал');
        $sheet->setCellValue('H6', 'ед-изм');
        $sheet->setCellValue('I6', 'кол-во');
        $sheet->setCellValue('J6', 'цена');
        $sheet->setCellValue('K6', 'сумма');
        $sheet->setCellValue('L6', 'Оплата за работу');
        $sheet->setCellValue('M6', 'Итого');

        $this->insertProductRow($sheet, 7, 1, 'Led светильник', 16, 'storage/images/picture-1.jpg', 'Заменить. (Окисление в контактах. Пластмассовые детали утеряли прочность от перепада температуры)', 'Led 24v', 'п.м', 3.2, 47040, 150528, 78400, 1404928);
        $this->insertProductRow($sheet, 8, 2, 'Led светильник', 12, 'storage/images/picture-2.jpg', 'Неисправность. Замена.', 'Led 24v', 'п.м', 2.4, 47040, 112896, 78400, 1053696);
        $this->insertProductRow($sheet, 9, 3, 'Проводка между лампами', 35, 'storage/images/picture-3.jpg', 'Окисление. Обрыв.  Замена.', 'Провод 2*2,5 (Морозостойкий)', 'п.м', 40, 28560, 1142400, 78400, 3886400);
        $this->insertProductRow($sheet, 10, 4, 'Основной провод питания', 8, 'storage/images/picture-4.jpg', 'Обрыв в сети. Нужно заменить.', 'Провод 2*2,5 (Морозостойкий)', 'п.м', 10, 28560, 285600, 78400, 912800);

        $sheet->setCellValue('A11', 'Итого');
        $sheet->setCellValue('N11', '7 257 824');


        $directory = Yii::getAlias('@webroot/uploads/reports');

        $fileName = 'Coffee_Issimo_' . time() . '.xlsx';
        $filePath = $directory . '/' . $fileName;

        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);

        return Yii::$app->response->sendFile($filePath)->send();
    }

    // Mahsulotni kiritish va rasmni joylash
    private function insertProductRow($sheet, $row, $number, $name, $quantity, $imagePath, $description, $material, $unit, $unitQty, $price, $totalPrice, $workPayment, $finalTotal): void
    {
        $sheet->setCellValue('A' . $row, $number);
        $sheet->setCellValue('B' . $row, $name);
        $sheet->setCellValue('C' . $row, $quantity);

        // Rasmni qo'shish
        if (file_exists($imagePath)) {
            $drawing = new Drawing();
            $drawing->setName($name);
            $drawing->setDescription($name);
            $drawing->setPath($imagePath); // Rasmning yo'li
            $drawing->setHeight(80); // Rasmni balandligini sozlash
            $drawing->setCoordinates('D' . $row); // Rasmni joylash
            $drawing->setWorksheet($sheet);
        } else {
            $sheet->setCellValue('D' . $row, 'Rasm topilmadi: ' . $imagePath);
        }

        $sheet->setCellValue('E' . $row, $description);
        $sheet->setCellValue('F' . $row, ''); // vaqt hozir kiritilmagan
        $sheet->setCellValue('G' . $row, $material);
        $sheet->setCellValue('H' . $row, $unit);
        $sheet->setCellValue('I' . $row, $unitQty);
        $sheet->setCellValue('J' . $row, $price);
        $sheet->setCellValue('K' . $row, $totalPrice);
        $sheet->setCellValue('L' . $row, $workPayment);
        $sheet->setCellValue('M' . $row, $finalTotal);
    }
}

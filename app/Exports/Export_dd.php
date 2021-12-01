<?php

namespace App\Exports;

use App\Models\Offer;
use App\Models\User;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithStartRow;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithProperties;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\ShouldmergeCells;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class Export_dd implements
FromCollection,
WithTitle,
ShouldAutoSize,
WithEvents
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public $id;
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function registerEvents():array
    {
        return [
            BeforeSheet::class=> function(BeforeSheet $event) {
                $event->sheet
                ->getPageSetup(9)
                ->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
                    // $event->sheet->getDelegate()->getPageSetup()->setPaperSize(8);
                // $event->sheet->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);
                    $event->sheet->setcellValue('A1','ที่')->mergeCells('A1:A2');
                    $event->sheet->setcellValue('B1','ชื่อโครงการ')->mergeCells('B1:B2');
                    $event->sheet->setcellValue('C1','ผู้ประสานงานโครงการ')->mergeCells('C1:C2');
                    $event->sheet->setcellValue('D1','หลักการและเหตุผล')->mergeCells('D1:D2');
                    $event->sheet->setcellValue('E1','เป้าหมาย')->mergeCells('E1:F1');
                    $event->sheet->setcellValue('E2','เชิงผลผลิต');
                    $event->sheet->setcellValue('F2','เชิงผลลัพธ์');
                    $event->sheet->setcellValue('G1','ผลที่คาดว่าจะเกิด')->mergeCells('G1:G2');
                    $event->sheet->setcellValue('H1','ระยะเวลาดำเนินโครงการ')->mergeCells('H1:I1');
                    $event->sheet->setcellValue('H2','วันที่เริ่มต้น');
                    $event->sheet->setcellValue('I2','วันที่สิ้นสุด');
                    $event->sheet->setcellValue('J1','สาเหตุที่ไม่สามารถเบิกจ่ายงบประมาณได้ตามแผนการ')->mergeCells('J1:J2');
                    $event->sheet->setcellValue('K1','พิกัดที่ตั้งโครงการ')->mergeCells('K1:K2');
                    $event->sheet->setcellValue('L1','สรุปผลการดำเนินงาน')->mergeCells('L1:L2');
                    $event->sheet->setcellValue('M1','ปัญหาและอุปสรรคในการดำเนินงาน')->mergeCells('M1:M2');
                    $event->sheet->setcellValue('N1','ข้อเสนอแนะ')->mergeCells('N1:N2');

                    $event->sheet->getDelegate()->getStyle('A1:N2')->applyFromArray([
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '000000'],
                            ],
                        ],
                        'alignment'=>[
                            'horizontal'=>'center',
                            'vertical'=>'center',
                        ],
                        'fill' =>['fillType' => 'solid','rotation' => 0, 'color' => ['rgb' => 'D9D9D9']],
                        'font'=>['name'=>'Angsana New','bold' => true,'size'=>'16']
                    ]);
                    $event->sheet->getDelegate()->getParent()->getDefaultStyle()->applyFromArray([
                        'font'=>[
                                    'name'=>'Angsana New',
                                    'size'=>'16',
                                ]

                        ]);

            },
            AfterSheet::class=> function(AfterSheet $event) {
                $event->sheet->getDelegate()->getStyle('A')->applyFromArray([
                    'alignment'=>[
                        'horizontal'=>'center',
                        'vertical'=>'center',
                    ],
                ]);
        }
        ];
    }
    public function collection()
    {

        $data= Offer::where('id',$this->id)->select('*','year as d_year')->get()->load('objective','procedure','time','useful','user','detail_budget','year.strategic.tactic', 'conclusion', 'problem', 'feedback')->first()->toArray();
        if(count($data['objective'])>0){
         $data['objective']  =collect($data['objective'])->map(function($item){
                 return $item['name'];
             })->toArray();

       }

       if(count($data['procedure'])>0){
         $data['procedure']  =collect($data['procedure'])->map(function($item){
                 return $item['name'];
             })->toArray();

       }
       if(count($data['useful'])>0){
         $data['useful']  =collect($data['useful'])->map(function($item){
                 return $item['name'];
             })->toArray();

       }
       if(count($data['time'])>0){
         $data['time']  =collect($data['time'])->map(function($item){
                 return [
                     "name" => $item['activity'],
                     "start" => $item['start'],
                     "end" => $item['stop']
                 ];
             })->toArray();

       }
       if(count($data['detail_budget'])>0){
         $data['detail_budget']  =collect($data['detail_budget'])->map(function($item){
                 return [
                     "detail" => $item['detail'],
                     "price" => $item['amount'],
                 ];
             })->toArray();

       }
       $dataexecl = array();

       $dataexecl[] =$data['id'];
       $dataexecl[] =$data['name'];
       $dataexecl[] =$data['responsible'];
       $dataexecl[] =$data['rational'];
       $dataexecl[] =$data['target_quantity'];
       $dataexecl[] =$data['target_quality'];
       $dataexecl[] = $data['useful'];
       $dataexecl[] =$data['time'][0]['start'];
       $dataexecl[] =$data['time'][count($data['time'])-1]['end'];
       $dataexecl[] =($data['status_result']==0)?'ไม่สามารถเบิกจ่ายได้ตามแผน':'เบิกจ่ายงบประมาณได้ตามแผน';
       $dataexecl[] =$data['location'];
       $dataexecl[] =$data['conclusion'];
       $dataexecl[] =$data['problem'];
       $dataexecl[] =$data['feedback'];
       $max = 0;
       foreach ( $dataexecl as $index=>$value) {
           if(gettype($value)=='array'){
               if(count($value)> $max){
                $max = count($value)-1;
            }
           }
      }
      $dataarray = [];
      for ($x = 0; $x <=  $max; $x++) {
        for ($xe = 0; $xe <=  count($dataexecl)-1; $xe++) {
                if(gettype($dataexecl[$xe])=='array'&&count($dataexecl[$xe])>$x){
                    if(gettype($dataexecl[$xe][$x])=='array'){
                        $dataarray[$x][$xe] = "-".$dataexecl[$xe][$x]['name'];
                    }else{
                        $dataarray[$x][$xe] = "-".$dataexecl[$xe][$x];
                    }
                }else if($x==0){
                    $dataarray[$x][$xe] = $dataexecl[$xe];
                }else{
                    $dataarray[$x][$xe] = '';
                }
        }
      }
        return collect([$dataarray]);
    }
       /**
     * @return int
     */

    public function title(): string
    {
        return 'รายงานการดำเนินงานโครงการ ' ;
    }

    public function headings():array{

        return [
            "ที่",
            "ชื่อโครงการ",
            "ผู้ประสานงานโครงการ",
            "หลักการและเหตุผล",
            "เป้าหมาย  เชิงผลผลิต/เชิงผลลัพธ์",

        ];
    }



}

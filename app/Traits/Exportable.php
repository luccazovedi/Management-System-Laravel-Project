
<phpnamespace App\Traits;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

trait Exportable
{
    public function export($modelClass, $fileName, $headings)
    {
        return Excel::download(new class($modelClass, $headings) implements \Maatwebsite\Excel\Concerns\FromCollection, \Maatwebsite\Excel\Concerns\WithHeadings {
            protected $modelClass;
            protected $headings;

            public function __construct($modelClass, $headings)
            {
                $this->modelClass = $modelClass;
                $this->headings = $headings;
            }

            public function collection()
            {
                return $this->modelClass::all();
            }

            public function headings(): array
            {
                return $this->headings;
            }
        }, Str::slug($fileName) . '.xlsx');
    }
}

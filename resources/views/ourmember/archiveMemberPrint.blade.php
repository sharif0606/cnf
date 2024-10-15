
<table class="table table-bordered mb-0">
    <thead>
        <tr>
            <th scope="col">{{__('ক্রমিক নং')}}</th>
            <th scope="col">{{__('নাম')}}</th>
            <th scope="col">{{__('সিরিয়াল পুরাতন/নতুন')}}</th>
            <th scope="col">{{__('পিতার নাম')}}</th>
            <th scope="col">{{__('মোবাইল (নিজস্ব)')}}</th>
            <th scope="col">{{__('রক্তের গ্রুপ')}}</th>
            <th scope="col">{{__('এনআইডি')}}</th>
            <th scope="col">{{__('চাকুরীর পদবি')}}</th>
        </tr>
    </thead>
    <tbody>
        @forelse($ourmember as $key=>$p)
        <tr>
            <th scope="row">{{ $key + 1 }}</th>
            <td>{{$p->name_bn}}</td>
            <td>{{$p->member_serial_no}}/{{$p->member_serial_no_new}}</td>
            <td>{{$p->father_name}}</td>
            <td>{{$p->personal_phone}}</td>
            <td>{{$p->blood_group}}</td>
            <td>{{$p->nid}}</td>
            <td>{{$p->designation_of_present_job}}</td>
        </tr>
        @empty
        <tr>
            <th colspan="8" class="text-center">No Data Found</th>
        </tr>
        @endforelse
    </tbody>
</table>
                    
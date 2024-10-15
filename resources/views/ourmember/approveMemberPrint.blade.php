
<table class="table table-bordered mb-0">
    <thead>
        <tr>
            <th scope="col">{{__('ক্রমিক নং')}}</th>
            <th scope="col">{{__('নাম')}}</th>
            <th scope="col">{{__('সিরিয়াল পুরাতন/নতুন')}}</th>
            <th scope="col">{{__('পাসওয়ার্ড')}}</th>
            <th scope="col">{{__('SMS')}}</th>
            <th scope="col">{{__('আর এস')}}</th>
            <th scope="col">{{__('পিতার নাম')}}</th>
            <th scope="col">{{__('মোবাইল (নিজস্ব)')}}</th>
            <th scope="col">{{__('সর্বশেষ রিনিউ')}}</th>
            <th scope="col">{{__('এনআইডি')}}</th>
            <th scope="col">{{__('চাকুরীর পদবি')}}</th>
            <th scope="col">{{__('জেলা')}}</th>
            <th scope="col">{{__('রক্তের গ্রুপ')}}</th>
        </tr>
    </thead>
    <tbody>
        @forelse($ourmember as $key=>$p)
        <tr>
            <th scope="row">
                {{ $key + 1 }}
            </th>
            <td>{{$p->name_bn}}</td>
            <td>{{$p->member_serial_no}}/{{$p->member_serial_no_new}}</td>
            <td>{{$p->profile_view_password}}</td>
            <td>
                @if ($p->sms_send != 0)
                    Send
                @else
                    Not Send
                @endif
            </td>
            <td>
                @if ($p->renew_serial_no != '')
                    {{$p->renew_serial_no}}
                @else
                    N/A
                @endif
            </td>
            <td>{{$p->father_name}}</td>
            <td>{{$p->personal_phone}}</td>
            <td>{{ $p->fee_collection_last?->year }}</td>
            <td>{{$p->nid}}</td>
            <td>{{$p->designation_of_present_job==4?$p->others_designation:$p->designation_of_present_job}}</td>
            <td>{{$p->district}}</td>
            <td>{{$p->blood_group}}</td>
        </tr>
        @empty
        <tr>
            <th colspan="11" class="text-center">No Data Found</th>
        </tr>
        @endforelse
    </tbody>
</table>
                    
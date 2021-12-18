<div class="md:flex gap-3">
    <div class="w-full">
        <div class=" border-gray-200 border rounded-3xl mb-4">
            <div class="rounded-3xl bg-white  relative overflow-hidden">
                <div class="px-3 pt-4 pb-2 text-center relative z-10">
                    <h4 class="text-sm uppercase text-blue-800 leading-tight tracking-widest">Total Users</h4>
                    <h3 class="text-3xl text-blue-600 font-semibold leading-tight my-3">{{ $countUser }}
                    </h3>
                </div>
                <div class="absolute bottom-0 inset-x-0">
                    <canvas id="chart1" height="70"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full">
        <div class="border-gray-200 border rounded-3xl mb-4">
            <div class="rounded-3xl bg-white  relative overflow-hidden">
                <div class="px-3 pt-4 pb-2 text-center relative z-10">
                    <h4 class="text-sm uppercase text-blue-800 leading-tight tracking-widest">All Requests</h4>
                    <h3 class="text-3xl text-blue-600 font-semibold leading-tight my-3">{{ $countReqW }}
                    </h3>
                </div>
                <div class="absolute bottom-0 inset-x-0">
                    <canvas id="chart2" height="70"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full">
        <div class="border-gray-200 border rounded-3xl mb-4">
            <div class="rounded-3xl bg-white  relative overflow-hidden">
                <div class="px-3 pt-4 pb-2 text-center relative z-10">
                    <h4 class="text-sm uppercase text-blue-800 leading-tight tracking-widest">Approved</h4>
                    <h3 class="text-3xl text-blue-600 font-semibold leading-tight my-3">{{ $countReqA }}
                    </h3>
                </div>
                <div class="absolute bottom-0 inset-x-0">
                    <canvas id="chart3" height="70"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

            
            <div class="md:flex gap-3">
                <div class="w-full">
                    <div class=" border-gray-200 border rounded-3xl shadow-sm mb-4">
                        <div class="rounded-3xl bg-white shadow-sm md:shadow-sm relative overflow-hidden">
                            <div class="px-3 pt-8 pb-10 text-center relative z-10">
                                <h4 class="text-sm uppercase text-gray-500 leading-tight">Users</h4>
                                <h3 class="text-3xl text-gray-700 font-semibold leading-tight my-3">{{ $countUser }}</h3>
                            </div>
                            <div class="absolute bottom-0 inset-x-0">
                                <canvas id="chart1" height="70"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full">
                    <div class="border-gray-200 border rounded-3xl shadow-sm mb-4">
                        <div class="rounded-3xl bg-white shadow-sm md:shadow-sm relative overflow-hidden">
                            <div class="px-3 pt-8 pb-10 text-center relative z-10">
                                <h4 class="text-sm uppercase text-gray-500 leading-tight">All Requests</h4>
                                <h3 class="text-3xl text-gray-700 font-semibold leading-tight my-3">{{ $countReqW }}</h3>
                            </div>
                            <div class="absolute bottom-0 inset-x-0">
                                <canvas id="chart2" height="70"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full">
                    <div class="border-gray-200 border rounded-3xl shadow-sm mb-4">
                        <div class="rounded-3xl bg-white shadow-sm md:shadow-sm relative overflow-hidden">
                            <div class="px-3 pt-8 pb-10 text-center relative z-10">
                                <h4 class="text-sm uppercase text-gray-500 leading-tight">Approved</h4>
                                <h3 class="text-3xl text-gray-700 font-semibold leading-tight my-3">{{ $countReqA }}</h3>
                            </div>
                            <div class="absolute bottom-0 inset-x-0">
                                <canvas id="chart3" height="70"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
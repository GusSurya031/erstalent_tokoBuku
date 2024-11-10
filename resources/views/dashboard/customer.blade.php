@extends('layouts.main')

@section('container')
    <div class="flex">
        <div class="w-1/6">
            @include('components.sidebar')
        </div>

        <div class="flex-1 p-6 gap-6 space-y-4">
            <h1 class="text-3xl font-bold">
                Customer List
            </h1>
            <p class="text-gray-500">
                Here are the list of customers that have made transactions in the bookstore.
            </p>
            <div class="flex w-full overflow-x-auto overflow-y-hidden items-center">
                <table class="table-hover table">
                    <thead>
                    <tr>
                        <th>
                            <div class="flex border-none items-center">
                                <div class="dropdown-container justify-center" style="border: none">
                                    <div class="dropdown dropdown-hover" style="border: none">
                                        <label class="btn my-2" tabindex="0" style="border: none">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="lucide lucide-filter opacity-75" style="border: none">
                                                <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/>
                                            </svg>
                                        </label>
                                        <div class="dropdown-menu dropdown-menu-bottom-right">
                                            <a class="dropdown-item text-sm border-none">A - Z</a>
                                            <a tabindex="-1" class="dropdown-item text-sm border-none">Z - A</a>
                                            <a tabindex="-1" class="dropdown-item text-sm border-none">Gender</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>
                            <div class="space-x-4 border-none">
                                <input type="text" class="input" placeholder="Search for books ...">
                                <button class="btn">Search</button>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>No. Phone</th>
                        <th>Gender</th>
                        <th style="text-align: center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>USER001</td>
                        <td>John Doe</td>
                        <td>johnsmith@gmail.com</td>
                        <td>********</td>
                        <td>081234567890</td>
                        <td>M</td>
                        <td style="text-align: center">
                            <label class="btn" for="modal-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="lucide lucide-pencil">
                                    <path
                                        d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/>
                                    <path d="m15 5 4 4"/>
                                </svg>
                            </label>
                            <x-modaleditcus/>
                            <label class="btn" for="modal-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="lucide lucide-trash-2">
                                    <path d="M3 6h18"/>
                                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/>
                                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                                    <line x1="10" x2="10" y1="11" y2="17"/>
                                    <line x1="14" x2="14" y1="11" y2="17"/>
                                </svg>
                            </label>
                            <x-modaldeletecus/>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="pagination justify-center">
                <button class="btn">
                    <svg width="18" height="18" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M12.2574 5.59165C11.9324 5.26665 11.4074 5.26665 11.0824 5.59165L7.25742 9.41665C6.93242 9.74165 6.93242 10.2667 7.25742 10.5917L11.0824 14.4167C11.4074 14.7417 11.9324 14.7417 12.2574 14.4167C12.5824 14.0917 12.5824 13.5667 12.2574 13.2417L9.02409 9.99998L12.2574 6.76665C12.5824 6.44165 12.5741 5.90832 12.2574 5.59165Z"
                              fill="#969696"/>
                    </svg>
                </button>
                <button class="btn btn-active">1</button>
                <button class="btn">2</button>
                <button class="btn">3</button>
                <button class="btn">
                    <svg width="18" height="18" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M7.74375 5.2448C7.41875 5.5698 7.41875 6.0948 7.74375 6.4198L10.9771 9.65314L7.74375 12.8865C7.41875 13.2115 7.41875 13.7365 7.74375 14.0615C8.06875 14.3865 8.59375 14.3865 8.91875 14.0615L12.7437 10.2365C13.0687 9.91147 13.0687 9.38647 12.7437 9.06147L8.91875 5.23647C8.60208 4.9198 8.06875 4.9198 7.74375 5.2448Z"
                              fill="#969696"/>
                    </svg>
                </button>
            </div>
        </div>
@endsection

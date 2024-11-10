<div class="flex flex-row sm:gap-10">
    <div class="sm:w-full sm:max-w-[18rem]">
        <input type="checkbox" id="sidebar-mobile-fixed" class="sidebar-state"/>
        <label for="sidebar-mobile-fixed" class="sidebar-overlay"></label>
        <aside
            class="sidebar sidebar-fixed-left sidebar-mobile h-full justify-start max-sm:fixed max-sm:-translate-x-full">
            <section class="sidebar-title justify-center items-center p-4">
                <a href="/"><h1 class="text-2xl font-bold">BookStore.</h1></a>
            </section>
            <section class="sidebar-content">
                <nav class="menu rounded-md">
                    <section class="menu-section px-4">
                        <span class="menu-title">Main menu</span>
                        <div class="menu-items">
                            <a href="/dashboard" class="menu-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="lucide lucide-layout-dashboard opacity-75">
                                    <rect width="7" height="9" x="3" y="3" rx="1"/>
                                    <rect width="7" height="5" x="14" y="3" rx="1"/>
                                    <rect width="7" height="9" x="14" y="12" rx="1"/>
                                    <rect width="7" height="5" x="3" y="16" rx="1"/>
                                </svg>
                                <span>Dashboard</span>
                            </a>

                            <a href="/dashboard/customers" class="menu-item">
                                <svg xmlns="http://www.w3.org/2000/svg" class="opacity-75" width="22" height="22"
                                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                                </svg>
                                Customers
                            </a>
                            <a href="/dashboard/transaction" class="menu-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="lucide lucide-shopping-cart opacity-75">
                                    <circle cx="8" cy="21" r="1"/>
                                    <circle cx="19" cy="21" r="1"/>
                                    <path
                                        d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/>
                                </svg>
                                <span>Transaction List</span>
                            </a>
                        </div>
                    </section>
                    <div class="divider my-0"></div>
                    <section class="menu-section px-4">
						<ul class="menu-items">
							<li class="menu-item">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out opacity-75"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>
								Log Out
							</li>
                        </ul>
                    </section>
                </nav>
            </section>
            <section class="sidebar-footer justify-end bg-gray-2 pt-2">
                <div class="divider my-0"></div>
                <div class="dropdown z-50 flex h-fit w-full cursor-pointer hover:bg-gray-4">
                    <label class="whites mx-2 flex h-fit w-full cursor-pointer p-0 hover:bg-gray-4" tabindex="0">
                        <div class="flex flex-row gap-4 p-4">
                            <div class="avatar-square avatar avatar-md">
                                <img src="https://i.pravatar.cc/150?img=30" alt="avatar"/>
                            </div>

                            <div class="flex flex-col">
                                <span>Sandra Marx</span>
                            </div>
                        </div>
                    </label>
                    <div class="dropdown-menu-right-top dropdown-menu ml-2">
                        <a class="dropdown-item text-sm">Profile</a>
                        <a tabindex="-1" class="dropdown-item text-sm">Account settings</a>
                        <a tabindex="-1" class="dropdown-item text-sm">Change email</a>
                        <a tabindex="-1" class="dropdown-item text-sm">Subscriptions</a>
                        <a tabindex="-1" class="dropdown-item text-sm">Change password</a>
                        <a tabindex="-1" class="dropdown-item text-sm">Refer a friend</a>
                        <a tabindex="-1" class="dropdown-item text-sm">Settings</a>
                    </div>
                </div>
            </section>
        </aside>
    </div>
    <div class="flex w-full flex-col p-4">
        <div class="w-fit">
            <label for="sidebar-mobile-fixed" class="btn-primary btn sm:hidden">Open Sidebar</label>
        </div>
    </div>
</div>

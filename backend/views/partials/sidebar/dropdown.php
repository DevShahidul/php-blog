<!-- Dropdown Menu Start -->
<div class="overflow-hidden transform translate" :class="(selected === 'Forms') ? 'block' :'hidden'">
    <ul :class="sidebarToggle ? 'xl:hidden' : 'flex'"
        class="menu-dropdown mt-2 flex flex-col gap-1 pl-9 rtl:pr-9 rtl:pl-0">
        <li>
            <a href="form-elements.html" class="menu-dropdown-item group"
                :class="page === 'formElements' ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive'"
                x-text="$t('sidebar.items.formElements')">
                Form Elements
            </a>
        </li>
    </ul>
</div>
<!-- Dropdown Menu End -->
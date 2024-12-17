<?php

//use system and pubgin
use Illuminate\Support\Facades\Route;

// use ecommerce
use Modules\Admin\Http\Controllers\Ecommerce\AttributeController;
use Modules\Admin\Http\Controllers\Ecommerce\AuthenticationController;
use Modules\Admin\Http\Controllers\Ecommerce\CategoryController;
use Modules\Admin\Http\Controllers\Ecommerce\CustomerController;
use Modules\Admin\Http\Controllers\Ecommerce\CustomerGroupController;
use Modules\Admin\Http\Controllers\Ecommerce\DashboardController;

// use crm
use Modules\Admin\Http\Controllers\Ecommerce\ExtensionController;
use Modules\Admin\Http\Controllers\Ecommerce\FeedbackController;

use Modules\Admin\Http\Controllers\Ecommerce\LinksController;
use Modules\Admin\Http\Controllers\Ecommerce\ManufacturerController;
use Modules\Admin\Http\Controllers\Ecommerce\ModuleController;
use Modules\Admin\Http\Controllers\Ecommerce\PagesController;
use Modules\Admin\Http\Controllers\Ecommerce\PreferencesController;
use Modules\Admin\Http\Controllers\Ecommerce\ProductController;
use Modules\Admin\Http\Controllers\Ecommerce\StoreController;
use Modules\Admin\Http\Controllers\Ecommerce\ThemesController;
use Modules\Admin\Http\Controllers\Ecommerce\VariantController;
use Modules\Admin\Http\Controllers\Location\Index as Location;

// use blog
use Modules\Admin\Http\Controllers\Post\AuthorController;
use Modules\Admin\Http\Controllers\Post\BlogController;
use Modules\Admin\Http\Controllers\Post\CategoryController as CategoryBlogController;
use Modules\Admin\Http\Controllers\Post\InteractiveController;
use Modules\Admin\Http\Controllers\Post\ReportController;
use Modules\Admin\Http\Controllers\Setting\AccountsController;
use Modules\Admin\Http\Controllers\Setting\ApplicationController;
use Modules\Admin\Http\Controllers\Setting\ChannelsController;
use Modules\Admin\Http\Controllers\Setting\CheckoutController as SettingCheckoutController;
use Modules\Admin\Http\Controllers\Setting\ConfigurationsController;
use Modules\Admin\Http\Controllers\Setting\DomainsController;
use Modules\Admin\Http\Controllers\Setting\FileController;
use Modules\Admin\Http\Controllers\Setting\LocationsController;
use Modules\Admin\Http\Controllers\Setting\LogsController;
use Modules\Admin\Http\Controllers\Setting\NotificationsController;
use Modules\Admin\Http\Controllers\Setting\OrderSourceController;
use Modules\Admin\Http\Controllers\Setting\PaymentsController;
use Modules\Admin\Http\Controllers\Setting\PlansController;
use Modules\Admin\Http\Controllers\Setting\PriceListsController;
use Modules\Admin\Http\Controllers\Setting\PrintFormsController;
use Modules\Admin\Http\Controllers\Setting\SettingController;
use Modules\Admin\Http\Controllers\Setting\ShippingController;
use Modules\Admin\Http\Controllers\Setting\TaxTypesController;
use Modules\Admin\Http\Controllers\Setting\TenantRolesController;

Route::group(['middleware' => ['web', 'admin_locale']], function () {
    Route::prefix('auth')->group(function () {
        Route::get('/admin/login', [AuthenticationController::class, 'login'])->name('login-admin');
        Route::get('/admin/verify', [AuthenticationController::class, 'verifyAccount'])->name('verify-account');
        Route::get('/admin/singup', [AuthenticationController::class, 'singup'])->name('singup-admin');
        Route::get('/admin/forgot', [AuthenticationController::class, 'forgot'])->name('forgot-admin');
        Route::get('/admin/signout', [AuthenticationController::class, 'signOut'])->name('signout-admin');
    });

    Route::prefix('location')->group(function () {
        Route::get('province/{country_id}', [Location::class, 'getProvinceByCountryId'])->name('location.province');
        Route::get('district/{province_id}', [Location::class, 'getDistrictByProvinceId'])->name('location.district');
        Route::get('commune/{district_id}', [Location::class, 'getCommuneByDistrictId']);
    });
    Route::post('customer/checkName', [CustomerController::class, 'checkName'])->name('customers.customer.checkName');

    Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['admin']], function () {

        // ecommerce
        Route::prefix('dashboard')->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
            Route::get('notifications', [DashboardController::class, 'notifications'])->name('admin.dashboard.notifications');
            Route::get('blog', [DashboardController::class, 'blog'])->name('admin.dashboard.blog');
            Route::get('crm', [DashboardController::class, 'CRM'])->name('admin.dashboard.crm');
        });

        Route::prefix('extension')->group(function () {
            Route::get('{type}/{module}', [ExtensionController::class, 'edit'])->name('admin.ecommerce.extension.edit');
            Route::prefix('module')->group(function () {
                Route::get('{type}/edit/{module_id}', [ModuleController::class, 'edit'])->name('admin.ecommerce.extension.module.edit');
                Route::post('{type}/create', [ModuleController::class, 'create'])->name('admin.ecommerce.extension.module.create');
                Route::post('{type}/update/{module_id}', [ModuleController::class, 'update'])->name('admin.ecommerce.extension.module.update');
                Route::get('{type}/delete/{module_id}', [ModuleController::class, 'destroy'])->name('admin.ecommerce.extension.module.destroy');
            });
        });

        Route::get('preferences', [PreferencesController::class, 'index'])->name('admin.ecommerce.preferences.index');

        Route::prefix('links')->group(function () {
            Route::get('/', [LinksController::class, 'index'])->name('admin.ecommerce.links.index');
            Route::post('/ajax/taskbar', [LinksController::class, 'ajaxGetTaskbarType'])->name('admin.ecommerce.links.ajax.taskbar');
            Route::get('create', [LinksController::class, 'create'])->name('admin.links.create');
            Route::post('store', [LinksController::class, 'store'])->name('admin.links.store');
            Route::get('edit/{id}', [LinksController::class, 'edit'])->name('admin.links.edit');
            Route::post('update/{id}', [LinksController::class, 'update'])->name('admin.links.update');
            Route::get('destroy/{id}', [LinksController::class, 'destroy'])->name('admin.links.destroy');

            Route::prefix('group')->group(function () {
                Route::post('store', [LinksController::class, 'storeGroup'])->name('admin.links.group.store');
                Route::post('update/{id}', [LinksController::class, 'updateGroup'])->name('admin.links.update.group');
            });
        });

        Route::prefix('pages')->group(function () {
            Route::get('list', [PagesController::class, 'index'])->name('admin.pages.list');
            Route::post('filter', [PagesController::class, 'filter'])->name('admin.pages.filter');
            Route::get('create', [PagesController::class, 'create'])->name('admin.pages.create');
            Route::post('store', [PagesController::class, 'store'])->name('admin.pages.store');
            Route::get('edit/{id}', [PagesController::class, 'edit'])->name('admin.pages.edit');
            Route::post('update/{id}', [PagesController::class, 'update'])->name('admin.pages.update');
            Route::get('destroy/{id}', [PagesController::class, 'destroy'])->name('admin.pages.destroy');
            Route::post('destroy/multiple', [PagesController::class, 'destroyMultiple'])->name('admin.pages.destroy.multiple');
        });

        Route::prefix('product')->group(function () {
            Route::get('list/all', [ProductController::class, 'index'])->name('admin.product.list.all');
            Route::post('list/filter', [ProductController::class, 'filter'])->name('admin.product.list.filter');
            Route::post('ajax', [ProductController::class, 'ajax'])->name('admin.product.ajax');
            Route::get('ajax/list', [ProductController::class, 'ajaxList'])->name('admin.product.ajax.list');
            Route::get('create', [ProductController::class, 'create'])->name('admin.product.create');
            Route::get('comment/list', [ProductController::class, 'comment'])->name('admin.product.comment.list');
            Route::post('store', [ProductController::class, 'store'])->name('admin.product.store');
            Route::get('edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
            Route::post('update/{id}', [ProductController::class, 'update'])->name('admin.product.update');
            Route::get('destroy/{id}', [ProductController::class, 'destroy'])->name('admin.product.destroy');
            Route::post('destroy/multiple', [ProductController::class, 'destroyMultiple'])->name('admin.product.destroy.multiple');
            Route::post('variant/ajax', [ProductController::class, 'ajaxVariant'])->name('admin.product.variant.ajax');
            Route::get('{parent_id}/variant/{id}', [ProductController::class, 'variant'])->name('admin.product.variant');
            Route::post('{parent_id}/variant/{id}', [ProductController::class, 'updateVariant'])->name('admin.product.update.variant');
        });

        Route::prefix('category')->group(function () {
            Route::get('list', [CategoryController::class, 'index'])->name('admin.category.list');
            Route::get('trash', [CategoryController::class, 'trash'])->name('admin.category.trash');
            Route::get('detail/{id}', [CategoryController::class, 'detail'])->name('admin.category.detail');
            Route::get('create', [CategoryController::class, 'create'])->name('admin.category.create');
            Route::post('store', [CategoryController::class, 'store'])->name('admin.category.store');
            Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
            Route::post('update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
            Route::get('destroy/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
            Route::post('ajax', [CategoryController::class, 'filter'])->name('admin.category.ajax');
            Route::get('ajax/list', [CategoryController::class, 'ajaxList'])->name('admin.category.ajax.list');

            Route::post('ajax/parent', [CategoryController::class, 'parent'])->name('admin.category.ajax.parent');
            Route::post('destroy/multiple', [CategoryController::class, 'destroyMultiple'])->name('admin.category.destroy.multiple');
            Route::post('change/status', [CategoryController::class, 'changeStatus'])->name('admin.category.change.status');
        });

        Route::prefix('variant')->group(function () {
            Route::get('list', [VariantController::class, 'index'])->name('admin.variant.list');
            Route::post('list/filter', [VariantController::class, 'filter'])->name('admin.variant.list.filter');
            Route::get('create', [VariantController::class, 'create'])->name('admin.variant.create');
            Route::post('store', [VariantController::class, 'store'])->name('admin.variant.store');
            Route::get('edit/{id}', [VariantController::class, 'edit'])->name('admin.variant.edit');
            Route::post('update/{id}', [VariantController::class, 'update'])->name('admin.variant.update');
            Route::get('destroy/{id}', [VariantController::class, 'destroy'])->name('admin.variant.destroy');
            Route::post('destroy/multiple', [VariantController::class, 'destroyMultiple'])->name('admin.variant.destroy.multiple');
        });

        Route::prefix('attribute')->group(function () {
            Route::get('list', [AttributeController::class, 'index'])->name('admin.attribute.list');
            Route::post('list/filter', [AttributeController::class, 'filter'])->name('admin.attribute.list.filter');
            Route::get('create', [AttributeController::class, 'create'])->name('admin.attribute.create');
            Route::post('store', [AttributeController::class, 'store'])->name('admin.attribute.store');
            Route::get('group/create', [AttributeController::class, 'createGroup'])->name('admin.attribute.create.group');
            Route::get('detail/{id}', [AttributeController::class, 'detail'])->name('admin.attribute.detail');
            Route::get('edit/{id}', [AttributeController::class, 'edit'])->name('admin.attribute.edit');
            Route::post('update/{id}', [AttributeController::class, 'update'])->name('admin.attribute.update');
            Route::get('destroy/{id}', [AttributeController::class, 'destroy'])->name('admin.attribute.destroy');
            Route::get('autocomplete', [AttributeController::class, 'autocomplete'])->name('admin.attribute.autocomplete');
            Route::post('destroy/multiple', [AttributeController::class, 'destroyMultiple'])->name('admin.attribute.destroy.multiple');
        });

        Route::prefix('manufacturer')->group(function () {
            Route::get('list', [ManufacturerController::class, 'index'])->name('admin.manufacturer.list');
            Route::post('list/filter', [ManufacturerController::class, 'filter'])->name('admin.manufacturer.list.filter');
            Route::get('create', [ManufacturerController::class, 'create'])->name('admin.manufacturer.create');
            Route::post('store', [ManufacturerController::class, 'store'])->name('admin.manufacturer.store');
            Route::get('edit/{id}', [ManufacturerController::class, 'edit'])->name('admin.manufacturer.edit');
            Route::post('update/{id}', [ManufacturerController::class, 'update'])->name('admin.manufacturer.update');
            Route::get('destroy/{id}', [ManufacturerController::class, 'destroy'])->name('admin.manufacturer.destroy');
            Route::post('destroy/multiple', [ManufacturerController::class, 'destroyMultiple'])->name('admin.manufacturer.destroy.multiple');
        });

        Route::prefix('customers')->group(function () {

            //customer
            Route::get('customer/list/all', [CustomerController::class, 'index'])->name('admin.customers.customer.list');
            Route::post('customer/list/filter', [CustomerController::class, 'filter'])->name('admin.customers.customer.filter');
            Route::get('customer/list/{customer_group_id}', [CustomerController::class, 'getCustomerByGroup'])->name('admin.customers.customer.group');
            ;
            Route::get('customer/create', [CustomerController::class, 'create'])->name('admin.customers.customer.create');
            Route::post('customer/store', [CustomerController::class, 'store'])->name('admin.customers.customer.store');
            Route::get('customer/edit/{id}', [CustomerController::class, 'edit'])->name('admin.customers.customer.edit');
            Route::post('customer/update/{id}', [CustomerController::class, 'update'])->name('admin.customers.customer.update');
            Route::get('customer/destroy/{id}', [CustomerController::class, 'destroy'])->name('admin.customers.customer.destroy');
            Route::post('customer/ajax', [CustomerController::class, 'ajax'])->name('admin.customers.customer.ajax');
            Route::post('customer/address/{customer_id}', [CustomerController::class, 'address'])->name('admin.customers.customer.address');
            Route::get('customer/destroy/address/{id}', [CustomerController::class, 'destroyAddress'])->name('admin.customers.customer.destroy.address');
            Route::post('customer/destroy/multiple', [CustomerController::class, 'destroyMultiple'])->name('admin.customers.customer.destroy.multiple');

            //customer group
            Route::get('group/list/all', [CustomerGroupController::class, 'index'])->name('admin.customers.group.list');
            Route::get('group/create', [CustomerGroupController::class, 'create'])->name('admin.customers.group.create');
            Route::post('group/store', [CustomerGroupController::class, 'store'])->name('admin.customers.group.store');
            Route::get('group/edit/{id}', [CustomerGroupController::class, 'edit'])->name('admin.customers.group.edit');
            Route::post('group/update/{id}', [CustomerGroupController::class, 'update'])->name('admin.customers.group.update');
            Route::get('group/destroy/{id}', [CustomerGroupController::class, 'destroy'])->name('admin.customers.group.destroy');

            Route::get('group/auto/create', [CustomerGroupController::class, 'createAuto']);
            Route::post('group/auto/store', [CustomerGroupController::class, 'storeAuto'])->name('admin.customers.group.store.auto');
            Route::post('group/auto/filter', [CustomerGroupController::class, 'filterAuto'])->name('admin.ecommerce.customer_group.apply_filter');


            Route::get('feedback/list', [FeedbackController::class, 'index'])->name('admin.customers.feedback.list');
            Route::post('feedback/filter', [FeedbackController::class, 'filter'])->name('admin.customers.feedback.filter');
            Route::get('feedback/{status}', [FeedbackController::class, 'status'])->name('admin.customers.feedback.status');
            Route::get('feedback/confirm/{id}', [FeedbackController::class, 'confirm'])->name('admin.customers.feedback.confirm');
        });

        Route::prefix('store')->group(function () {
            Route::get('list', [StoreController::class, 'index'])->name('admin.store.list');
            Route::get('create', [StoreController::class, 'create'])->name('admin.store.create');
            Route::post('store', [StoreController::class, 'store'])->name('admin.store.store');
            Route::get('edit/{id}', [StoreController::class, 'edit'])->name('admin.store.edit');
            Route::post('update/{id}', [StoreController::class, 'update'])->name('admin.store.update');
            Route::get('destroy/{id}', [StoreController::class, 'destroy'])->name('admin.store.destroy');

            Route::get('rating', [StoreController::class, 'rating'])->name('admin.store.rating');
            Route::get('report', [StoreController::class, 'report'])->name('admin.store.report');
            Route::get('add', [StoreController::class, 'create'])->name('admin.store.add');
        });

        //blog
        Route::prefix('post')->group(function () {
            Route::prefix('blog')->group(function () {
                Route::get('list', [BlogController::class, 'index'])->name('admin.post.blog.list');
                Route::post('filter', [BlogController::class, 'filter'])->name('admin.post.blog.filter');
                Route::get('create', [BlogController::class, 'create'])->name('admin.post.blog.create');
                Route::post('store', [BlogController::class, 'store'])->name('admin.post.blog.store');
                Route::get('edit/{id}', [BlogController::class, 'edit'])->name('admin.post.blog.edit');
                Route::post('update/{id}', [BlogController::class, 'update'])->name('admin.post.blog.update');
                Route::get('destroy/{id}', [BlogController::class, 'destroy'])->name('admin.post.blog.destroy');
                Route::post('destroy/multiple', [BlogController::class, 'destroyMultiple'])->name('admin.post.blog.destroy.multiple');
                Route::post('change/status', [BlogController::class, 'changeStatus'])->name('admin.post.blog.change.status');
                Route::get('comment/list', [BlogController::class, 'comment'])->name('admin.post.blog.comment.list');
                Route::get('ajax/list', [BlogController::class, 'ajaxList'])->name('admin.post.blog.ajax.list');
            });

            Route::prefix('interactive')->group(function () {
                Route::get('list', [InteractiveController::class, 'index'])->name('admin.post.interactive.list');
            });

            Route::prefix('author')->group(function () {
                Route::get('list', [AuthorController::class, 'index'])->name('admin.post.author.list');
                Route::get('blog', [AuthorController::class, 'blog'])->name('admin.post.author.blog');
            });

            Route::prefix('report')->group(function () {
                Route::get('list', [ReportController::class, 'index'])->name('admin.post.report.list');
            });

            Route::prefix('category')->group(function () {
                Route::get('list', [CategoryBlogController::class, 'index'])->name('admin.post.category.list');
                Route::post('filter', [CategoryBlogController::class, 'filter'])->name('admin.post.category.filter');
                Route::get('create', [CategoryBlogController::class, 'create'])->name('admin.post.category.create');
                Route::post('store', [CategoryBlogController::class, 'store'])->name('admin.post.category.store');
                Route::get('edit/{id}', [CategoryBlogController::class, 'edit'])->name('admin.post.category.edit');
                Route::post('update/{id}', [CategoryBlogController::class, 'update'])->name('admin.post.category.update');
                Route::get('destroy/{id}', [CategoryBlogController::class, 'destroy'])->name('admin.post.category.destroy');
                Route::post('destroy/multiple', [CategoryBlogController::class, 'destroyMultiple'])->name('admin.post.category.destroy.multiple');
                Route::post('change/status', [CategoryBlogController::class, 'changeStatus'])->name('admin.post.category.change.status');
                Route::get('ajax/list', [CategoryBlogController::class, 'ajaxList'])->name('admin.post.category.ajax.list');
            });
        });

        //setting
        Route::prefix('setting')->group(function () {
            Route::prefix('accounts')->group(function () {
                Route::get('/', [AccountsController::class, 'index'])->name('admin.setting.accounts');
                Route::get('create', [AccountsController::class, 'create'])->name('admin.setting.accounts.create');
                Route::post('store', [AccountsController::class, 'store'])->name('admin.setting.accounts.store');
                Route::get('edit/{id}', [AccountsController::class, 'edit'])->name('admin.setting.accounts.edit');
                Route::post('update/{id}', [AccountsController::class, 'update'])->name('admin.setting.accounts.update');
                Route::get('destroy/{id}', [AccountsController::class, 'destroy'])->name('admin.setting.accounts.destroy');
                Route::post('destroy/multiple', [AccountsController::class, 'destroyMultiple'])->name('admin.setting.accounts.destroyMultiple');
                Route::post('checkName', [AccountsController::class, 'checkName'])->name('admin.setting.accounts.checkName');
            });

            Route::get('channels', [ChannelsController::class, 'index'])->name('admin.setting.channels');
            Route::get('checkout', [SettingCheckoutController::class, 'index'])->name('admin.setting.checkout');
            Route::get('configurations', [ConfigurationsController::class, 'index'])->name('admin.setting.configurations');
            Route::get('domains', [DomainsController::class, 'index'])->name('admin.setting.domains');
            Route::get('locations', [LocationsController::class, 'index'])->name('admin.setting.locations');
            Route::get('notifications', [NotificationsController::class, 'index'])->name('admin.setting.notifications');
            Route::get('order_sources', [OrderSourceController::class, 'index'])->name('admin.setting.order_sources');
            Route::get('payments', [PaymentsController::class, 'index'])->name('admin.setting.payments');
            Route::get('plans', [PlansController::class, 'index'])->name('admin.setting.plans');
            Route::get('price_lists', [PriceListsController::class, 'index'])->name('admin.setting.price_lists');
            Route::get('print_forms', [PrintFormsController::class, 'index'])->name('admin.setting.print_forms');
            Route::get('shipping', [ShippingController::class, 'index'])->name('admin.setting.shipping');

            //tax
            Route::prefix('tax_types')->group(function () {
                Route::get('/', [TaxTypesController::class, 'index'])->name('admin.setting.tax_types');
                Route::get('create', [TaxTypesController::class, 'create'])->name('admin.setting.tax_types.create');
                Route::post('store', [TaxTypesController::class, 'store'])->name('admin.setting.tax_types.store');
                Route::get('edit/{id}', [TaxTypesController::class, 'edit'])->name('admin.setting.tax_types.edit');
                Route::post('update/{id}', [TaxTypesController::class, 'update'])->name('admin.setting.tax_types.update');
                Route::get('destroy/{id}', [TaxTypesController::class, 'destroy'])->name('admin.setting.tax_types.destroy');
            });

            Route::get('tenant_roles', [TenantRolesController::class, 'index'])->name('admin.setting.tenant_roles');
            Route::get('tenant_roles/detail', [TenantRolesController::class, 'detail'])->name('admin.setting.tenant_roles.detail');
            Route::get('logs', [LogsController::class, 'index'])->name('admin.setting.logs');

            Route::prefix('setting')->group(function () {
                Route::get('list', [SettingController::class, 'index'])->name('admin.setting.list');
                Route::get('store', [SettingController::class, 'store'])->name('admin.setting.store');
                Route::post('create', [SettingController::class, 'create'])->name('admin.setting.create');
            });

            Route::prefix('file')->group(function () {
                Route::get('list', [FileController::class, 'index'])->name('admin.setting.file.list');
            });

            Route::prefix('application')->group(function () {
                Route::get('list', [ApplicationController::class, 'index'])->name('admin.setting.application.list');
            });
        });

        Route::fallback(function () {
            return view("admin::error.404", ['previous' => route('admin.dashboard')]);
        });
    });
});

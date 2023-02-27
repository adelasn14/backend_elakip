<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>Story API Documentation</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="Description">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/docsify@4/lib/themes/vue.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
        <body>
        <main>
            <button class="sidebar-toggle" aria-label="Menu">
                <div class="sidebar-toggle-button">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <aside class="sidebar">
                <a href="/index">
                    <i class="fa fa-arrow-left" style="font-size:20px; margin:15px;"></i>
                </a>
                <div class="sidebar-nav">
                    <ul>
                            <li>
                                <a class="section-link" href="#/?id=el-akip" title="Dokumentasi API El-AKIP">El-AKIP</a>
                            </li>
                        <ul>
                            <li>
                                <a class="section-link" href="#/?id=endpoint" title="Endpoint">Endpoint</a>
                            </li>
                            <ul>
                                <li>
                                    <a class="section-link" href="#/?id=login_attempt" title="login_attempt">Login_Attempt</a>
                                </li>
                                <li>
                                    <a class="section-link" href="#/?id=visi" title="visi">Visi</a>
                                    <ul>
                                        <li>
                                        <a class="section-link" href="#/?id=visi_create" title="visi_create">Create</a>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                        <a class="section-link" href="#/?id=visi_read" title="visi_read">Read</a>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                        <a class="section-link" href="#/?id=visi_read_by_id" title="visi_read_by_id">Read By ID</a>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                        <a class="section-link" href="#/?id=visi_update" title="visi_update">Update</a>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                        <a class="section-link" href="#/?id=visi_delete" title="visi_delete">Delete</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="section-link" href="#/?id=misi" title="Misi">Misi</a>
                                    <ul>
                                        <li>
                                        <a class="section-link" href="#/?id=misi_create" title="misi_create">Create</a>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                        <a class="section-link" href="#/?id=misi_read" title="misi_read">Read</a>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                        <a class="section-link" href="#/?id=misi_read_by_id" title="misi_read_by_id">Read By ID</a>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                        <a class="section-link" href="#/?id=misi_update" title="misi_update">Update</a>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                        <a class="section-link" href="#/?id=misi_delete" title="misi_delete">Delete</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="section-link" href="#/?id=tujuan" title="Tujuan">Tujuan</a>
                                    <ul>
                                        <li>
                                        <a class="section-link" href="#/?id=tujuan_create" title="tujuan_create">Create</a>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                        <a class="section-link" href="#/?id=tujuan_read" title="tujuan_read">Read</a>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                        <a class="section-link" href="#/?id=tujuan_read_by_id" title="tujuan_read_by_id">Read By ID</a>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                        <a class="section-link" href="#/?id=tujuan_update" title="tujuan_update">Update</a>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                        <a class="section-link" href="#/?id=tujuan_delete" title="tujuan_delete">Delete</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="section-link" href="#/?id=indikator_target" title="Target & Indikator">Target & Indikator</a>
                                    <ul>
                                        <li>
                                        <a class="section-link" href="#/?id=indikator_target_create" title="indikator_target_create">Create</a>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                        <a class="section-link" href="#/?id=indikator_target_read" title="indikator_target_read">Read</a>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                        <a class="section-link" href="#/?id=indikator_target_read_by_id" title="indikator_target_read_by_id">Read By ID</a>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                        <a class="section-link" href="#/?id=indikator_target_update" title="indikator_target_update">Update</a>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                        <a class="section-link" href="#/?id=indikator_target_delete" title="indikator_target_delete">Delete</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="section-link" href="#/?id=kegiatan" title="Kegiatan">Kegiatan</a>
                                    <ul>
                                        <li>
                                        <a class="section-link" href="#/?id=kegiatan_create" title="kegiatan_create">Create</a>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                        <a class="section-link" href="#/?id=kegiatan_read" title="kegiatan_read">Read</a>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                        <a class="section-link" href="#/?id=kegiatan_read_by_id" title="kegiatan_read_by_id">Read By ID</a>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                        <a class="section-link" href="#/?id=kegiatan_update" title="kegiatan_update">Update</a>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                        <a class="section-link" href="#/?id=kegiatan_delete" title="kegiatan_delete">Delete</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </ul>
                    </ul>
                </div>
            </aside>

            <section class="content">
                <article class="markdown-section" id="main">
                    <h1 id="el-akip">
                        <a href="#/?id=el-akip" data-id="el-akip" class="anchor">
                            <span>Dokumentasi API El-AKIP</span>
                        </a>
                    </h1>
                    
                    <blockquote>
                        <p>API untuk mengakses backend aplikasi El-AKIP.</p>
                    </blockquote>

                    <!-- Endpoint -->
                    
                    <h4 id="endpoint">
                        <a href="#/?id=endpoint" data-id="endpoint" class="anchor">
                            <span>Endpoint</span>
                        </a>
                    </h4>
                    
                    <p>
                        <a href="https://refined-iridium-373115.uc.r.appspot.com/dok_api" target="_blank" rel="noopener">https://refined-iridium-373115.uc.r.appspot.com/dok_api</a>
                    </p>

                    <!-- Login_Attempt -->
                    
                    <h3 id="login_attempt">
                        <a href="#/?id=login_attempt" data-id="login_attempt" class="anchor">
                            <span>Login_Attempt</span>
                        </a>
                    </h3>
                    
                    <ul><li>URL<ul><li><code>/login</code></li></ul></li><li>Method<ul><li>POST</li></ul></li><li>Input : body > raw > json<ul><li><code>username</code> as <code>string</code></li><li><code>password</code> as <code>string</code></li></ul></li><li>Response
                        <pre v-pre="" data-lang="json"><code class="lang-json">
    {
        "message" : "User is successfully logging in",
        "data" : {
            "id_login" : "115",
            "user_id" : "15",
            "username" : "adel",
            "password" : "adel",
            "logtime" : "2022-10-15 19:39:50",
            "stat" : "1"
        }
    } 
                </code></pre></li></ul>

                <!-- Visi -->
                
                <h3 id="visi">
                    <a href="#/?id=visi" data-id="visi" class="anchor">
                        <span>Visi</span>
                    </a>
                </h3>

                <h4 id="visi_create">
                    <a href="#/?id=visi_create" data-id="visi_create" class="anchor">
                        <span>Create</span>
                    </a>
                </h4>
            
                <ul><li>URL<ul><li><code>/visi/create</code></li></ul></li><li>Method<ul><li>POST</li></ul></li><li>Input : body > raw > json<ul><li><code>user_id</code> as <code>int</code></li><li><code>visi</code> as <code>string</code></li><li><code>penjabaran_visi</code> as <code>string</code></li></ul></li><li>Response<pre v-pre="" data-lang="json"><code class="lang-json">
    {
        "message" : "Visi is successfully added",
        "data": {
            "id_visi": "115",
            "user_id": "20",
            "visi": "visi 2",
            "penjabaran_visi": "penjabaran visi 2",
            "logtime": "2022-10-31 22:27:05"
        }
    }
                </code></pre></li></ul>

                <h4 id="visi_read">
                    <a href="#/?id=visi_read" data-id="visi_read" class="anchor">
                        <span>Read</span>
                    </a>
                </h4>

                <ul><li>URL<ul><li><code>/visi/read</code></li></ul></li><li>Method<ul><li>GET</li></ul></li><li>Response<pre v-pre="" data-lang="json"><code class="lang-json">
    {
        "message": "Visi is found!",
        "data_visi": [
            {
                "id_visi": "208",
                "user_id": "20",
                "username": "vida",
                "visi": "visi 14",
                "penjabaran_visi": "penjabaran visi 14",
                "logtime": "2023-01-04 14:42:28"
            }
        ]
    }
                </code></pre></li></ul>

                <h4 id="visi_read_by_id">
                    <a href="#/?id=visi_read_by_id" data-id="visi_read_by_id" class="anchor">
                        <span>Read By ID</span>
                    </a>
                </h4>

                <ul><li>URL<ul><li><code>/visi/read_single</code></li></ul></li><li>Method<ul><li>GET</li></ul></li><li>Input : Params<ul><li><code>id</code> as <code>int</code></li></ul></li><li>Response<pre v-pre="" data-lang="json"><code class="lang-json">
    {
        "id_visi": "120",
        "user_id": "20",
        "username": "vida",
        "visi": "visi 3",
        "penjabaran_visi": "penjabaran visi 3",
        "logtime": "2022-11-21 13:58:57"
    }
                </code></pre></li></ul>

                <h4 id="visi_update">
                    <a href="#/?id=visi_update" data-id="visi_update" class="anchor">
                        <span>Update</span>
                    </a>
                </h4>

                <ul><li>URL<ul><li><code>/visi/update</code></li></ul></li><li>Method<ul><li>PUT</li></ul></li><li>Input : body > raw > json<ul><li><code>id</code> as <code>int</code></li><li><code>visi</code> as <code>string</code></li><li><code>penjabaran_visi</code> as <code>string</code></li></ul></li><li>Response<pre v-pre="" data-lang="json"><code class="lang-json">
    {
        "message": "Visi is successfully updated",
        "data_visi_updated": {
            "id_visi": "121",
            "visi": "visi 1",
            "penjabaran_visi": "penjabaran visi 1"
        }
    }
                </code></pre></li></ul>

                <h4 id="visi_delete">
                    <a href="#/?id=visi_delete" data-id="visi_delete" class="anchor">
                        <span>Delete</span>
                    </a>
                </h4>

                <ul><li>URL<ul><li><code>/visi/delete</code></li></ul></li><li>Method<ul><li>DELETE</li></ul></li><li>Input : body > raw > json<ul><li><code>id</code> as <code>int</code></li></ul></li><li>Response<pre v-pre="" data-lang="json"><code class="lang-json">
    {
        "message": "Visi is successfully deleted",
        "data_visi_deleted": "208"
    }
                </code></pre></li></ul>

                <!-- Misi -->
                
                <h3 id="misi">
                    <a href="#/?id=misi" data-id="Misi" class="anchor">
                        <span>Misi</span>
                    </a>
                </h3>

                <h4 id="misi_create">
                    <a href="#/?id=misi_create" data-id="misi_create" class="anchor">
                        <span>Create</span>
                    </a>
                </h4>
                
                <ul><li>URL<ul><li><code>/misi/create</code></li></ul></li><li>Method<ul><li>POST</li></ul></li><li>Input : body > raw > json<ul><li><code>user_id</code> as <code>int</code></li><li><code>misi</code> as <code>string</code></li></ul></li><li>Response<pre v-pre="" data-lang="json"><code class="lang-json">
    {
        "message": "Misi is successfully added",
        "data_misi": {
            "id_misi": "9",
            "user_id": "2",
            "misi": "misi 14",
            "logtime": "2023-01-04 14:53:19"
        }
    }
                </code></pre></li></ul>

                <h4 id="misi_read">
                    <a href="#/?id=misi_read" data-id="misi_read" class="anchor">
                        <span>Read</span>
                    </a>
                </h4>

                <ul><li>URL<ul><li><code>/misi/read</code></li></ul></li><li>Method<ul><li>GET</li></ul></li><li>Response<pre v-pre="" data-lang="json"><code class="lang-json">
    {
        "message": "Misi found!",
        "data_misi": [
            {
                "id_misi": "9",
                "user_id": "2",
                "username": "kabgrobogan",
                "misi": "misi 14",
                "logtime": "2023-01-04 14:53:19"
            },
        ]
    }
                </code></pre></li></ul>

                <h4 id="misi_read_by_id">
                    <a href="#/?id=misi_read_by_id" data-id="misi_read_by_id" class="anchor">
                        <span>Read By ID</span>
                    </a>
                </h4>

                <ul><li>URL<ul><li><code>/misi/read_single</code></li></ul></li><li>Method<ul><li>GET</li></ul></li><li>Input : Params<ul><li><code>id</code> as <code>int</code></li></ul></li><li>Response<pre v-pre="" data-lang="json"><code class="lang-json">
    {
        "id_misi": "9",
        "user_id": "2",
        "username": "kabgrobogan",
        "misi": "misi 14",
        "logtime": "2023-01-04 14:53:19"
    }
                </code></pre></li></ul>

                <h4 id="misi_update">
                    <a href="#/?id=misi_update" data-id="misi_update" class="anchor">
                        <span>Update</span>
                    </a>
                </h4>

                <ul><li>URL<ul><li><code>/misi/update</code></li></ul></li><li>Method<ul><li>PUT</li></ul></li><li>Input : body > raw > json<ul><li><code>id</code> as <code>int</code></li><li><code>misi</code> as <code>string</code></li></ul></li><li>Response<pre v-pre="" data-lang="json"><code class="lang-json">
    {
        "message": "Misi Updated",
        "data_misi_updated": {
            "id_misi": "9",
            "misi": "misi ke 14"
        }
    }
                </code></pre></li></ul>

                <h4 id="misi_delete">
                    <a href="#/?id=misi_delete" data-id="misi_delete" class="anchor">
                        <span>Delete</span>
                    </a>
                </h4>

                <ul><li>URL<ul><li><code>/misi/delete</code></li></ul></li><li>Method<ul><li>DELETE</li></ul></li><li>Input : body > raw > json<ul><li><code>id</code> as <code>int</code></li></ul></li><li>Response<pre v-pre="" data-lang="json"><code class="lang-json">
    {
        "message": "Misi is successfully deleted",
        "data_misi_deleted": "9"
    }
                </code></pre></li></ul>
                
                <!-- Tujuan -->
                
                <h3 id="tujuan">
                    <a href="#/?id=tujuan" data-id="tujuan" class="anchor">
                        <span>Tujuan</span>
                    </a>
                </h3>

                <h4 id="tujuan_create">
                    <a href="#/?id=tujuan_create" data-id="tujuan_create" class="anchor">
                        <span>Create</span>
                    </a>
                </h4>
                
                <ul><li>URL<ul><li><code>/tujuan/create</code></li></ul></li><li>Method<ul><li>POST</li></ul></li><li>Input : body > raw > json<ul><li><code>user_id</code> as <code>int</code></li><li><code>id_misi</code> as <code>int</code></li><li><code>tujuan</code> as <code>string</code></li></ul></li><li>Response<pre v-pre="" data-lang="json"><code class="lang-json">
    {
        "message": "Tujuan is succesfully added",
        "data_tujuan": {
            "id_tujuan": "52",
            "user_id": "2",
            "id_misi": "8",
            "tujuan": "tujuan 14",
            "logtime": "2023-01-04 14:58:35"
        }
    }
                </code></pre></li></ul>

                <h4 id="tujuan_read">
                    <a href="#/?id=tujuan_read" data-id="tujuan_read" class="anchor">
                        <span>Read</span>
                    </a>
                </h4>

                <ul><li>URL<ul><li><code>/tujuan/read</code></li></ul></li><li>Method<ul><li>GET</li></ul></li><li>Response<pre v-pre="" data-lang="json"><code class="lang-json">
    {
        "message": "Tujuan is found!",
        "data_tujuan": [
            {
                "id_tujuan": "52",
                "user_id": "2",
                "username": "kabgrobogan",
                "id_misi": "8",
                "misi": "misi 5",
                "tujuan": "tujuan 14",
                "logtime": "2023-01-04 14:58:35"
            },
        ]
    }
                </code></pre></li></ul>

                <h4 id="tujuan_read_by_id">
                    <a href="#/?id=tujuan_read_by_id" data-id="tujuan_read_by_id" class="anchor">
                        <span>Read By ID</span>
                    </a>
                </h4>

                <ul><li>URL<ul><li><code>/tujuan/read_single</code></li></ul></li><li>Method<ul><li>GET</li></ul></li><li>Input : Params<ul><li><code>id</code> as <code>int</code></li></ul></li><li>Response<pre v-pre="" data-lang="json"><code class="lang-json">
    {
        "id_tujuan": "50",
        "user_id": "20",
        "username": "vida",
        "id_misi": "4",
        "misi": "misi 3",
        "tujuan": "tujuan ke 2",
        "logtime": "2023-01-02 12:50:46"
    }
                </code></pre></li></ul>

                <h4 id="tujuan_update">
                    <a href="#/?id=tujuan_update" data-id="tujuan_update" class="anchor">
                        <span>Update</span>
                    </a>
                </h4>

                <ul><li>URL<ul><li><code>/tujuan/update</code></li></ul></li><li>Method<ul><li>PUT</li></ul></li><li>Input : body > raw > json<ul><li><code>id</code> as <code>int</code></li><li><code>tujuan</code> as <code>string</code></li></ul></li><li>Response<pre v-pre="" data-lang="json"><code class="lang-json">
    {
        "message": "Tujuan is successfully updated",
        "data_tujuan_updated": {
            "id_tujuan": "52",
            "tujuan": "tujuan ke 14"
        }
    }
                </code></pre></li></ul>

                <h4 id="tujuan_delete">
                    <a href="#/?id=tujuan_delete" data-id="tujuan_delete" class="anchor">
                        <span>Delete</span>
                    </a>
                </h4>

                <ul><li>URL<ul><li><code>/tujuan/delete</code></li></ul></li><li>Method<ul><li>DELETE</li></ul></li><li>Input : body > raw > json<ul><li><code>id</code> as <code>int</code></li></ul></li><li>Response<pre v-pre="" data-lang="json"><code class="lang-json">
    {
        "message": "Tujuan is successfully deleted",
        "data_tujuan_deleted": "52"
    }
                </code></pre></li></ul>

                <!-- Indikator & Target -->

                <h3 id="indikator_target">
                    <a href="#/?id=indikator_target" data-id="indikator_target" class="anchor">
                        <span>Target & Indikator</span>
                    </a>
                </h3>

                <h4 id="indikator_target_create">
                    <a href="#/?id=indikator_target_create" data-id="indikator_target_create" class="anchor">
                        <span>Create</span>
                    </a>
                </h4>
                
                <ul><li>URL<ul><li><code>/indikator_target/create</code></li></ul></li><li>Method<ul><li>POST</li></ul></li><li>Input : body > raw > json<ul><li><code>user_id</code> as <code>int</code></li><li><code>id_tujuan</code> as <code>int</code></li><li><code>indikator</code> as <code>string</code></li><li><code>target</code> as <code>string</code></li></ul></li><li>Response<pre v-pre="" data-lang="json"><code class="lang-json">
    {
        "message": "Target is succesfully added",
        "data_indikator_target": {
            "id_indikator_target": "20",
            "user_id": "15",
            "id_tujuan": "50",
            "indikator": "%",
            "target": "127",
            "logtime": "2023-01-04 15:04:37"
        }
    }
                </code></pre></li></ul>

                <h4 id="indikator_target_read">
                    <a href="#/?id=indikator_target_read" data-id="indikator_target_read" class="anchor">
                        <span>Read</span>
                    </a>
                </h4>

                <ul><li>URL<ul><li><code>/indikator_target/read</code></li></ul></li><li>Method<ul><li>GET</li></ul></li><li>Response<pre v-pre="" data-lang="json"><code class="lang-json">
    {
        "message": "Target found!",
        "data_indikator_target": [
            {
                "id_indikator_target": "20",
                "user_id": "15",
                "username": "adel",
                "id_tujuan": "50",
                "tujuan": "tujuan ke 2",
                "target": "127",
                "indikator": "%",
                "logtime": "2023-01-04 15:04:37"
            },
        ]
    }
                </code></pre></li></ul>

                <h4 id="indikator_target_read_by_id">
                    <a href="#/?id=indikator_target_read_by_id" data-id="indikator_target_read_by_id" class="anchor">
                        <span>Read By ID</span>
                    </a>
                </h4>

                <ul><li>URL<ul><li><code>/indikator_target/read_single</code></li></ul></li><li>Method<ul><li>GET</li></ul></li><li>Input : Params<ul><li><code>id</code> as <code>int</code></li></ul></li><li>Response<pre v-pre="" data-lang="json"><code class="lang-json">
    {
        "id_indikator_target": "20",
        "user_id": "15",
        "username": "adel",
        "id_tujuan": "50",
        "tujuan": "tujuan ke 2",
        "target": "127",
        "indikator": "%",
        "logtime": "2023-01-04 15:04:37"
    }
                </code></pre></li></ul>

                <h4 id="indikator_target_update">
                    <a href="#/?id=indikator_target_update" data-id="indikator_target_update" class="anchor">
                        <span>Update</span>
                    </a>
                </h4>

                <ul><li>URL<ul><li><code>/indikator_target/update</code></li></ul></li><li>Method<ul><li>PUT</li></ul></li><li>Input : body > raw > json<ul><li><code>id</code> as <code>int</code></li><li><code>indikator</code> as <code>string</code></li><li><code>target</code> as <code>string</code></li></ul></li><li>Response<pre v-pre="" data-lang="json"><code class="lang-json">
    {
        "message": "Target is successfully updated",
        "data_indikator_target_updated": {
            "id_indikator_target": "20",
            "indikator": "orang",
            "target": "127"
        }
    }
                </code></pre></li></ul>

                <h4 id="indikator_target_delete">
                    <a href="#/?id=indikator_target_delete" data-id="indikator_target_delete" class="anchor">
                        <span>Delete</span>
                    </a>
                </h4>

                <ul><li>URL<ul><li><code>/indikator_target/delete</code></li></ul></li><li>Method<ul><li>DELETE</li></ul></li><li>Input : body > raw > json<ul><li><code>id</code> as <code>int</code></li></ul></li><li>Response<pre v-pre="" data-lang="json"><code class="lang-json">
    {
        "message": "Target is successfully deleted",
        "data_target_deleted": "20"
    }
                </code></pre></li></ul>

                    <!-- Kegiatan -->
                    
                <h3 id="kegiatan">
                    <a href="#/?id=kegiatan" data-id="kegiatan" class="anchor">
                        <span>Kegiatan</span>
                    </a>
                </h3>

                <h4 id="kegiatan_create">
                    <a href="#/?id=kegiatan_create" data-id="kegiatan_create" class="anchor">
                        <span>Create</span>
                    </a>
                </h4>

                <ul><li>URL<ul><li><code>/kegiatan/create</code></li></ul></li><li>Method<ul><li>POST</li></ul></li><li>Input : body > raw > json<ul><li><code>user_id</code> as <code>int</code></li><li><code>id_misi</code> as <code>int</code></li><li><code>id_tujuan</code> as <code>int</code></li><li><code>kegiatan</code> as <code>string</code></li></ul></li><li>Response<pre v-pre="" data-lang="json"><code class="lang-json">
    {
        "message": "Kegiatan is succesfully added",
        "data_kegiatan": {
            "id_kegiatan": "10",
            "user_id": "15",
            "id_misi": "8",
            "id_tujuan": "50",
            "kegiatan": "kegiatan 14",
            "logtime": "2023-01-04 15:43:52"
        }
    }
                </code></pre></li></ul>

                <h4 id="kegiatan_read">
                    <a href="#/?id=kegiatan_read" data-id="kegiatan_read" class="anchor">
                        <span>Read</span>
                    </a>
                </h4>

                <ul><li>URL<ul><li><code>/kegiatan/read</code></li></ul></li><li>Method<ul><li>GET</li></ul></li><li>Response<pre v-pre="" data-lang="json"><code class="lang-json">
    {
        "message": "Kegiatan is found!",
        "data_kegiatan": [
            {
                "id_kegiatan": "10",
                "user_id": "15",
                "username": "adel",
                "id_tujuan": "50",
                "tujuan": "tujuan ke 2",
                "id_misi": "8",
                "misi": "misi 5",
                "kegiatan": "kegiatan 14",
                "logtime": "2023-01-04 15:43:52"
            },
        ]
    }
                </code></pre></li></ul>

                <h4 id="kegiatan_read_by_id">
                    <a href="#/?id=kegiatan_read_by_id" data-id="kegiatan_read_by_id" class="anchor">
                        <span>Read By ID</span>
                    </a>
                </h4>

                <ul><li>URL<ul><li><code>/kegiatan/read_single</code></li></ul></li><li>Method<ul><li>GET</li></ul></li><li>Input : Params<ul><li><code>id</code> as <code>int</code></li></ul></li><li>Response<pre v-pre="" data-lang="json"><code class="lang-json">
    {
        "id_kegiatan": "10",
        "user_id": "15",
        "username": "adel",
        "id_tujuan": "50",
        "tujuan": "tujuan ke 2",
        "id_misi": "8",
        "misi": "misi 5",
        "kegiatan": "kegiatan 14",
        "logtime": "2023-01-04 15:43:52"
    }
                </code></pre></li></ul>

                <h4 id="kegiatan_update">
                    <a href="#/?id=kegiatan_update" data-id="kegiatan_update" class="anchor">
                        <span>Update</span>
                    </a>
                </h4>

                <ul><li>URL<ul><li><code>/kegiatan/update</code></li></ul></li><li>Method<ul><li>PUT</li></ul></li><li>Input : body > raw > json<ul><li><code>id</code> as <code>int</code></li><li><code>kegiatan</code> as <code>string</code></li></ul></li><li>Response<pre v-pre="" data-lang="json"><code class="lang-json">
    {
        "message": "Kegiatan is successfully updated",
        "data_kegiatan_updated": {
            "id_kegiatan": "20",
            "kegiatan": "kegiatan 3"
        }
    }
                </code></pre></li></ul>

                <h4 id="kegiatan_delete">
                    <a href="#/?id=kegiatan_delete" data-id="kegiatan_delete" class="anchor">
                        <span>Delete</span>
                    </a>
                </h4>

                <ul><li>URL<ul><li><code>/kegiatan/delete</code></li></ul></li><li>Method<ul><li>DELETE</li></ul></li><li>Input : body > raw > json<ul><li><code>id</code> as <code>int</code></li></ul></li><li>Response<pre v-pre="" data-lang="json"><code class="lang-json">
    {
        "message": "Kegiatan is successfully deleted",
        "data_kegiatan_deleted": "20"
    }
                </code></pre></li></ul>
                    
                </article></section></main>
                    <script>
                    window.$docsify = {
                        name: '',
                        repo: ''
                    }
                    </script>
                    <!-- Docsify v4 -->
                    <script src="//cdn.jsdelivr.net/npm/docsify@4"></script>


                    <div class="progress" style="opacity: 0; width: 0%;"></div>
    </body>
</html>
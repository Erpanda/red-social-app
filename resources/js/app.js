import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', () => {

    const singIn = document.getElementById('signIn');
    const singUp = document.getElementById('signUp');
    const signInContainer = document.getElementById('signIn-container');
    const signUpContainer = document.getElementById('signUp-container');
    const overlay = document.getElementById('overlay');
    const overlaySlider = document.getElementById('overlay-slider');

    singIn?.addEventListener('click', () => {
        overlaySlider.style.transform = 'translateX(0)';
        signInContainer.style.transform = 'translateX(0)';
        signUpContainer.style.transform = 'translateX(0)';
        signInContainer.classList.replace('z-10', 'z-20');
        signUpContainer.classList.replace('z-20', 'z-10');
        overlay.classList.replace('left-0', 'left-1/2');
    });

    singUp?.addEventListener('click', () => {
        overlaySlider.style.transform = 'translateX(-50%)';
        signInContainer.style.transform = 'translateX(100%)';
        signUpContainer.style.transform = 'translateX(100%)';
        signInContainer.classList.replace('z-20', 'z-10');
        signUpContainer.classList.replace('z-10', 'z-20');
        overlay.classList.replace('left-1/2', 'left-0');
    });

    // Evitamos la repeticion continua de peticiones
    const btnLogin = document.getElementById('btn-login');
    const btnRegister = document.getElementById('btn-register');

    [btnLogin, btnRegister].forEach((btn, index) => {
        const form = btn?.closest('form');
        const otherBtn = index === 0 ? singUp : singIn;

        form?.addEventListener('submit', (e) => {
            if (!form.checkValidity()) return;
            
            btn.disabled = true;
            otherBtn.disabled = true;
        });
    });

    // #####################################################
    // Modales de Usuario

    // window.abrirModal = function(tipo) {
    //     document.body.style.overflow = 'hidden';

    //     if (tipo === 'Photo') {
    //         document.getElementById('modalPhoto')?.classList.remove('hidden');
    //     } else {
    //         document.getElementById('modalPost')?.classList.remove('hidden');
    //     }
    // }

    window.abrirModal = function(tipo, subtipo = 'perfil') {
        document.body.style.overflow = 'hidden';

        if (tipo === 'Photo') {
            const modal = document.getElementById('modalPhoto');
            const form = document.getElementById('formPhoto');
            const titulo = modal.querySelector('h2');
            const preview = document.getElementById('selectPhotoPreview');
            const input = document.getElementById('inputPhoto');
            const contenedor = modal.querySelector('.relative.rounded-xl');

            // Overlay círculo
            const overlay = document.getElementById('overlayCirculo');
            overlay.classList.toggle('hidden', subtipo !== 'perfil');

            // Tamaño de la photo
            const sizePhoto = document.getElementById('sizePhoto');
            const sizes = { perfil: 'h-full aspect-square', portada: 'h-52 md:h-64 lg:h-72' }[subtipo];
            sizePhoto.classList.remove('aspect-square', 'h-52', 'md:h-64', 'lg:h-72');
            sizePhoto.classList.add(...sizes.split(' '));

            document.querySelectorAll('#fotosSugeridas img').forEach(img => {
                img.classList.toggle('hidden', img.dataset.tipo !== subtipo);
            });

            const grid = document.getElementById('fotosSugeridas');
            grid.className = subtipo === 'perfil' 
                ? 'grid grid-cols-4 gap-2' 
                : 'grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-2';

            const esPerfil = subtipo === 'perfil';

            titulo.textContent = esPerfil ? 'Elegir foto de perfil' : 'Elegir foto de portada';
            form.action = esPerfil ? form.dataset.actionAvatar : form.dataset.actionPortada;
            input.name = esPerfil ? 'avatar' : 'portada';
            preview.classList.toggle('aspect-square', esPerfil);
            preview.classList.toggle('aspect-video', !esPerfil);
            contenedor.classList.replace(esPerfil ? 'max-w-4xl' : 'max-w-md', esPerfil ? 'max-w-md' : 'max-w-4xl');

            modal.classList.remove('hidden');
        } else {
            document.getElementById('modalPost')?.classList.remove('hidden');
        }
    }

    function viewPreviewPhoto(state) {
        if (state) {
            document.getElementById(`selectPhoto`)?.classList.replace('flex', 'hidden');
            document.getElementById(`selectPhotoPreview`)?.classList.replace('hidden', 'grid');
            return;
        }
        document.getElementById(`previewPhoto`).src = '';
        document.getElementById(`selectPhotoPreview`)?.classList.replace('grid', 'hidden');
        document.getElementById(`selectPhoto`)?.classList.replace('hidden', 'flex');
    }

    window.cerrarModal = function(tipo) {
        document.body.style.overflow = 'auto';

        if (tipo === 'Photo') {
            const input = document.getElementById('inputPhoto');
            if (input) input.value = '';

            viewPreviewPhoto(false);

            document.getElementById('modalPhoto')?.classList.add('hidden');
        } else {
            const text = document.getElementById('hiddenContenido').value;
            const placeholder = document.getElementById('textSpanPost').dataset.placeholder;
            document.getElementById('textSpanPost').innerHTML = text !== '' ? text : placeholder;

            document.getElementById('modalPost')?.classList.add('hidden');
        }
    }

    document.getElementById(`inputPhoto`)?.addEventListener('change', (e) => {
        const file = e.target.files[0];
        if (!file) return;

        viewPreviewPhoto(true);

        const preview = document.getElementById(`previewPhoto`);
        if (preview) preview.src = URL.createObjectURL(file);
    });
    

    // #########################################################
    // Sscroll asincrono (interno y general)

    window.addEventListener('wheel', function (e) {
        const feed = document.getElementById('feed-scroll');
        if (!feed) return; // si no existe, ignora ._.

        const maxWindowScroll = document.documentElement.scrollHeight - window.innerHeight;

        if (window.scrollY >= maxWindowScroll && e.deltaY > 0) {
            e.preventDefault();
            feed.scrollTop += e.deltaY;
            return;
        }

        if (feed.scrollTop <= 0 && e.deltaY < 0) {
            e.preventDefault();
            window.scrollBy(0, e.deltaY);
            return;
        }

        if (feed.scrollTop > 0 && e.deltaY < 0) {
            e.preventDefault();
            feed.scrollTop += e.deltaY;
            return;
        }

    }, { passive: false });


    // ################################################################
    // Solo se permiten hast 5 elementos
    function validateNroElements(contenedor) {
        if (contenedor.children.length != 2) {
            const arrayElements = Array.from(contenedor.children).slice(2);
            let contador = 0;
            arrayElements.forEach(cont => {
                contador += cont.children.length;
            });
            return contador < 5;
        }
        return true;
    }

    // ################################################################
    // Calculemos la distribución de los elenmtos (multimedia)
    function calcularDistribucion(content) {

        const nro = content.children.length;
        const items = content.children;

        content.style.gridTemplateColumns = '';
        Array.from(items).forEach(el => {
            el.style.gridColumn = ''
        });

        if (nro === 1) return;
        if (nro !== 5) {
            content.style.gridTemplateColumns = 'repeat(2, minmax(0, 1fr))';
            if (nro === 3) items[2].style.gridColumn = '1 / -1';
            return
        }

        content.style.gridTemplateColumns = 'repeat(6, minmax(0, 1fr))';
        items[0].style.gridColumn = 'span 3';
        items[1].style.gridColumn = 'span 3';
        items[2].style.gridColumn = 'span 2';
        items[3].style.gridColumn = 'span 2';
        items[4].style.gridColumn = 'span 2';
    }

    // ################################################################
    // Filtramos la presentación dle nombre de los archivos tipo file
    function filtrarNombre(nom) {
        if (nom.length <= 40) return nom;

        const partes = nom.split('.');
        const extension = partes.pop();
        const nombreBase = partes.join('.');

        const nomCorto = nombreBase.slice(0, 33);

        return `${nomCorto}...${extension}`;
    }

    // inplementar elementos la modal de post
    window.abrirSelectorMedia = function (tipo) {
        const contenedor = document.getElementById('contentDataPost');
        if (!validateNroElements(contenedor)) {
            mostrarMensaje('Limite de archivos alcanzado');
            return;
        };

        const containerId = { multimedia: 'content-multimedia', gif: 'content-multimedia', file: 'content-files' }[tipo];
        const accept = { multimedia: 'image/*', gif: '.gif,image/gif', file: '.pdf,.doc,.docx,.xls,.xlsx' }[tipo];

        let contentMedia = contenedor.querySelector(`#${containerId}`);
        if (!contentMedia) {
            contentMedia = document.createElement('div');
            contentMedia.id = containerId;
            contentMedia.className = 'grid gap-3';
            contenedor.appendChild(contentMedia);
        }

        const id = Date.now();

        contentMedia.insertAdjacentHTML('beforeend', `
            <div class="relative hidden" id="media-${id}">
                <input type="file" name="archivos[${tipo}][]" accept="${accept}" class="hidden">
                ${tipo === 'file'
                    ? `<div class="w-full bg-gray-700 rounded-md px-4 py-3 flex items-center gap-3">
                        <svg class="w-8 h-8 text-yellow-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <span class="text-white text-sm truncate file-name">Ningún archivo seleccionado</span>
                    </div>`
                    : `<img class="w-full object-cover aspect-square rounded-md">`
                }
                <button style="position:absolute; top:5px; right:5px;" class="bg-gray-900 font-semibold hover:bg-yellow-300 text-white hover:text-gray-900 rounded-full w-6 h-6 flex items-center justify-center text-sm transition">
                    &times;
                </button>
            </div>
        `);

        const wrapper = document.getElementById(`media-${id}`);
        const input = wrapper.querySelector('input');
        const btn = wrapper.querySelector('button');

        btn.onclick = () => {
            wrapper.remove();
            if (contentMedia.children.length === 0) {
                contentMedia.remove();
            } else if (tipo != 'file') {
                calcularDistribucion(contentMedia);
            }
        };

        input.click();

        const onFocus = () => {
            setTimeout(() => {
                if (!input.files.length) {
                    btn.onclick();
                }
            }, 300);
            window.removeEventListener('focus', onFocus);
        };
        window.addEventListener('focus', onFocus);

        input.addEventListener('change', e => {
            const file = e.target.files[0];
            if (!file) {
                btn.onclick();
                return;
            };

            if (tipo === 'file') {
                const nomFile = filtrarNombre(file.name);
                wrapper.querySelector('.file-name').textContent = nomFile;
            } else {
                const img = wrapper.querySelector('img');
                const url = URL.createObjectURL(file);
                img.src = url;
                img.onload = () => URL.revokeObjectURL(url);
            }

            wrapper.classList.remove('hidden');
            if (tipo != 'file') calcularDistribucion(contentMedia);

            if (document.getElementById('modalPost').classList.contains('hidden')) {
                abrirModal('Post');
            }
        });
    };

    // ################################################################
    // Altura mutable del textarea del post
    // Detectamos los Hacktag (#)

    function getCursorOffset(el) {
        const sel = window.getSelection();        // obtiene la selección actual del navegador
        if (!sel.rangeCount) return 0;            // si no hay cursor, retorna 0
        const range = sel.getRangeAt(0).cloneRange(); // clona el range actual para no modificarlo
        range.selectNodeContents(el);             // expande el range para cubrir todo el div
        range.setEnd(sel.getRangeAt(0).endContainer, sel.getRangeAt(0).endOffset); // lo recorta hasta donde está el cursor
        return range.toString().length;           // cuenta los caracteres en ese tramo
    }

    function setCursorOffset(el, offset) {
        const walker = document.createTreeWalker(el, NodeFilter.SHOW_TEXT); // recorre solo nodos de texto, ignora tags
        let node, count = 0;
        while ((node = walker.nextNode())) {      // va nodo por nodo
            if (count + node.length >= offset) { // si en este nodo está el offset buscado
                const range = document.createRange();
                range.setStart(node, offset - count); // posiciona el cursor dentro del nodo
                range.collapse(true);            // colapsa el range a un punto (sin selección)
                const sel = window.getSelection();
                sel.removeAllRanges();
                sel.addRange(range);             // aplica el cursor
                return;
            }
            count += node.length;               // acumula los caracteres del nodo actual
        }
    }

    document.addEventListener('input', function (e) {
        if (e.target.id !== 'textContentPost') return;
        
        e.target.dataset.filled = e.target.innerText.trim() !== '' ? 'true' : 'false';

        const offset = getCursorOffset(e.target);
        const texto = e.target.innerText;
        const formateado = texto.replace(/#\w+/g, match => `<span style="color: #60a5fa;">${match}</span>`);
        e.target.innerHTML = formateado;
        setCursorOffset(e.target, offset);
        document.getElementById('hiddenContenido').value = e.target.innerText;
    });


    // ===========================================================================
    // Cerra el modal al registra el post
    function validacionCampos() {
        const contenido = document.getElementById('hiddenContenido').value.trim();
        const contenedor = document.getElementById('contentDataPost');

        const hayTexto = contenido.length > 0;
        const hayContenidoExtra = contenedor && contenedor.children.length > 2;

        return hayTexto || hayContenidoExtra;
    }

    function stateAnimation(state, type = 'post') {
        const btn = document.querySelector(`#btnSubmitAccion[data-type="${type}"]`);
        const typeText = { photo: 'Actualizar Foto', post: 'Publicar' }[type];
        const text = btn.querySelector('.btn-text');
        const spinner = btn.querySelector('.btn-spinner');

        btn.disabled = state;
        text.textContent = state ? 'Procesando...' : typeText;
        spinner.classList.toggle('hidden');
    }

    function formatearFomulario(type) {
        if (type === 'post') {
            document.getElementById('hiddenContenido').value = '';
            document.getElementById('textContentPost').innerHTML = '';
            const contenedor = document.getElementById('contentDataPost');
            if (contenedor.children.length > 2) {
                Array.from(contenedor.children).slice(2).forEach(el => el.remove());
            }
            cerrarModal('Post');
        } else {
            viewPreviewPhoto(false);
            cerrarModal('Photo');
        };
    }

    async function processFetch(formData, action, type) {
        const res = await fetch(action, {
            method: 'POST',
            body: formData,
            headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content }
        });

        if (!res.ok) throw new Error('Error en la respuesta del servidor');

        const data = await res.json();

        if (data.success) {
            formatearFomulario(type);
            if (type === 'post') {
                mostrarMensaje(data.message, 'exito');
                const tabContent = document.getElementById('tab-content');
                if (tabContent) recargarTab('posts');
            } else window.location.reload();
        }
        else mostrarMensaje(data.message, 'error');
    }

    const formPhoto = document.getElementById('formPhoto');
    const formPost = document.getElementById('formPost');

    [formPhoto, formPost].forEach((form) => {
        form?.addEventListener('submit', e => {
            e.preventDefault();

            if (form === formPost) {
                if (!validacionCampos()) {
                    mostrarMensaje('Debes escribir algo o subir al menos un archivo', 'info');
                    return;
                }
            }
            
            document.body.style.pointerEvents = 'none';
            stateAnimation(true, form === formPhoto ? 'photo' : 'post');

            setTimeout(() => {
                processFetch(new FormData(form), form.action, form === formPhoto ? 'photo' : 'post')
                    .catch(err => mostrarMensaje(err.message || 'Ocurrió un error inesperado', 'error'))
                    .finally(() => {
                        document.body.style.pointerEvents = '';
                        stateAnimation(false, form === formPhoto ? 'photo' : 'post');
                    });
            }, 0);
        });
    })

    document.addEventListener('click', function(e) {
        const item = e.target.closest('.multimediaItem');
        if (!item) return;

        const items = Array.from(item.closest('.dataMultimedia').children);
        const index = items.indexOf(item);
        
        mostrarVistaMultimedia(items, index);
    });

})

// ========================================================================================
// Vista de archivos multimedia
// Aplicamos un tipo de carrucel
let multimediaItems = [];
let multimediaIndex = 0;

window.mostrarVistaMultimedia = function(items, index) {
    document.body.style.overflow = 'hidden';
    multimediaItems = items;
    multimediaIndex = index;
    renderMultimedia();
    document.getElementById('viewMultimedia').classList.remove('hidden');
}

window.cerrarVistaMultimedia = function() {
    document.body.style.overflow = 'auto';
    document.getElementById('viewMultimedia').classList.add('hidden');
    document.getElementById('viewMultimediaContent').removeChild(container.firstChild);
    multimediaItems, multimediaIndex = [], 0;
}

// Botnes de cambio (posterior y previo elemwnto)
window.navegarMultimedia = function(dir) {
    multimediaIndex = (multimediaIndex + dir + multimediaItems.length) % multimediaItems.length;
    renderMultimedia();
}

function renderMultimedia() {
    const item = multimediaItems[multimediaIndex];
    const content = document.getElementById('viewMultimediaContent');

    document.getElementById('viewMultimediaPrev').classList.toggle('hidden', multimediaItems.length <= 1);
    document.getElementById('viewMultimediaNext').classList.toggle('hidden', multimediaItems.length <= 1);

    if (item.tagName === 'IMG') {
        content.innerHTML = `<img src="${item.src}" style="max-height: 85vh; max-width: 100%; border-radius: 0.75rem; object-fit: contain;">`;
    } else {
        content.innerHTML = `<video src="${item.src}" controls autoplay style="max-height: 85vh; max-width: 100%; border-radius: 0.75rem;"></video>`;
    }
}

// ========================================================================================

window.mostrarMensaje = function(mensaje, tipo = 'info') {
    const el = document.getElementById('contentMessage');
    if (!el) return;

    const estilos = {
        info:  {
            background: 'rgba(250, 204, 21, 0.15)', border: '1px solid rgba(202, 138, 4, 0.4)', color: '#facc15',
            icon: `<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>`
        },
        exito: {
            background: 'rgba(34, 197, 94, 0.15)', border: '1px solid rgba(22, 163, 74, 0.4)', color: '#22c55e',
            icon: `<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>`
        },
        error: {
            background: 'rgba(239, 68, 68, 0.15)', border: '1px solid rgba(220, 38, 38, 0.4)', color: '#ef4444',
            icon: `<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>`
        },
    };

    const estilo = estilos[tipo] ?? estilos.info;

    el.style.background = estilo.background;
    el.style.border = estilo.border;
    el.style.color = estilo.color;

    el.innerHTML = `
        <div class="flex items-center gap-2">
            ${estilo.icon}
            <span>${mensaje}</span>
        </div>
    `;
    el.classList.remove('hidden');

    el.classList.add('border');
    el.classList.remove('translate-x-full');
    el.classList.add('translate-x-0');

    setTimeout(() => {
        el.classList.remove('border');
        el.classList.remove('translate-x-0');
        el.classList.add('translate-x-full');

        setTimeout(() => {
            el.style.background = '';
            el.style.border = '';
            el.style.color = '';
            el.innerHTML = '';
        }, 300);
    }, 2000);
}

// Elementos de la sección Posts (profile)
window.ajustarMultimedia = function() {
    document.querySelectorAll('.dataMultimedia')?.forEach(content => {
        const nro = content.children.length;
        if ([1, 2, 4].includes(nro)) return;

        if (nro !== 5) {
            content.classList.remove('grid-cols-2');
            content.classList.add('grid-cols-3');
            return;
        }

        const items = content.children;

        content.classList.remove('grid-cols-2');
        content.classList.add('grid-cols-6');

        for (let i = 0; i < 5; i++) {
            if (i < 3 ) items[i].classList.add(`col-span-2`);
            else items[i].classList.add(`col-span-3`);
        }
        return;
    });
}

// Recargar o cmabiar de sección tab
window.recargarTab = function(tab) {
    const userId = document.getElementById('tab-content')?.dataset.userId ?? null;

    fetch(`/perfil/${userId}/tab/${tab}`)
        .then(res => res.text())
        .then(html => {
            document.getElementById('tab-content').innerHTML = html;
            ajustarMultimedia();
        });
}
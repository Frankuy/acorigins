PGDMP                         w         	   acorigins    11.5    11.5                0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false                        0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                       false            !           1262    16393 	   acorigins    DATABASE     �   CREATE DATABASE acorigins WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'English_United States.1252' LC_CTYPE = 'English_United States.1252';
    DROP DATABASE acorigins;
             postgres    false            �            1259    16420    checks    TABLE     u   CREATE TABLE public.checks (
    user_id bigint NOT NULL,
    gear_id bigint NOT NULL,
    owned boolean NOT NULL
);
    DROP TABLE public.checks;
       public         postgres    false            �            1259    16404    gears    TABLE     �   CREATE TABLE public.gears (
    id bigint NOT NULL,
    name character varying(100) NOT NULL,
    rarity character varying(10) NOT NULL,
    category character varying(20) NOT NULL
);
    DROP TABLE public.gears;
       public         postgres    false            �            1259    16402    gears_id_seq    SEQUENCE     u   CREATE SEQUENCE public.gears_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.gears_id_seq;
       public       postgres    false    199            "           0    0    gears_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.gears_id_seq OWNED BY public.gears.id;
            public       postgres    false    198            �            1259    16396 
   migrations    TABLE     �   CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         postgres    false            �            1259    16394    migrations_id_seq    SEQUENCE     �   CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.migrations_id_seq;
       public       postgres    false    197            #           0    0    migrations_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;
            public       postgres    false    196            �            1259    16412    users    TABLE     �   CREATE TABLE public.users (
    id bigint NOT NULL,
    username character varying(100) NOT NULL,
    password character varying(255) NOT NULL
);
    DROP TABLE public.users;
       public         postgres    false            �            1259    16410    users_id_seq    SEQUENCE     u   CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public       postgres    false    201            $           0    0    users_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;
            public       postgres    false    200            �
           2604    16407    gears id    DEFAULT     d   ALTER TABLE ONLY public.gears ALTER COLUMN id SET DEFAULT nextval('public.gears_id_seq'::regclass);
 7   ALTER TABLE public.gears ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    199    198    199            �
           2604    16399    migrations id    DEFAULT     n   ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);
 <   ALTER TABLE public.migrations ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    196    197    197            �
           2604    16415    users id    DEFAULT     d   ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    201    200    201                      0    16420    checks 
   TABLE DATA               9   COPY public.checks (user_id, gear_id, owned) FROM stdin;
    public       postgres    false    202   �                 0    16404    gears 
   TABLE DATA               ;   COPY public.gears (id, name, rarity, category) FROM stdin;
    public       postgres    false    199   !                 0    16396 
   migrations 
   TABLE DATA               :   COPY public.migrations (id, migration, batch) FROM stdin;
    public       postgres    false    197   5                 0    16412    users 
   TABLE DATA               7   COPY public.users (id, username, password) FROM stdin;
    public       postgres    false    201   p5       %           0    0    gears_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.gears_id_seq', 432, true);
            public       postgres    false    198            &           0    0    migrations_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.migrations_id_seq', 3, true);
            public       postgres    false    196            '           0    0    users_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.users_id_seq', 2, true);
            public       postgres    false    200            �
           2606    16424    checks checks_pkey 
   CONSTRAINT     ^   ALTER TABLE ONLY public.checks
    ADD CONSTRAINT checks_pkey PRIMARY KEY (user_id, gear_id);
 <   ALTER TABLE ONLY public.checks DROP CONSTRAINT checks_pkey;
       public         postgres    false    202    202            �
           2606    16409    gears gears_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.gears
    ADD CONSTRAINT gears_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.gears DROP CONSTRAINT gears_pkey;
       public         postgres    false    199            �
           2606    16401    migrations migrations_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.migrations DROP CONSTRAINT migrations_pkey;
       public         postgres    false    197            �
           2606    16417    users users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public         postgres    false    201            �
           2606    16419    users users_username_unique 
   CONSTRAINT     Z   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_username_unique UNIQUE (username);
 E   ALTER TABLE ONLY public.users DROP CONSTRAINT users_username_unique;
       public         postgres    false    201            �
           2606    16430    checks checks_gear_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.checks
    ADD CONSTRAINT checks_gear_id_foreign FOREIGN KEY (gear_id) REFERENCES public.gears(id) ON DELETE CASCADE;
 G   ALTER TABLE ONLY public.checks DROP CONSTRAINT checks_gear_id_foreign;
       public       postgres    false    199    202    2707            �
           2606    16425    checks checks_user_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.checks
    ADD CONSTRAINT checks_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;
 G   ALTER TABLE ONLY public.checks DROP CONSTRAINT checks_user_id_foreign;
       public       postgres    false    201    202    2709               3  x�5�K�!�u�aF�P|�2ǘ�k��ce�!�E�����?}�_�ڌ(��lu�u�YP�Y�]�m5V���z����WUwA'��}�]�G��m�����Mu^��o�_tׂ�:^t������C��=��$Z�F�̤%�Nn^��)��E�}�9��G�a����x��?��>�t/�c��s�7���mͷ�[�-��x�%�ݟpK�M��a�]�1�:������S�e�#_k~�Ǉ�����-��\�r���˗��������h�����x��3�f�F���s�c��7W�?���8E��            x���Iw�:�������ݛs�}�A�R�۱��ZN|�H�ED�I;ʧ�q u{��F�( ���@�z�����'��x0u�V2����e��쫈�#��wyĔ���*���<Pb�}�:<
.|�E,��-w��1��ޖo�3�J$����������H�W�:B�L)!�}%?.��sqE/�Bn�3��w��>��3k��w��biƳ��'W�j}��QC����Q~@q�5h>���u�6����b�,z��go�[6W���[�(c�o�&֕Pu���Q=3�뉘Z�P&��O�����ZJ�r(�k�G���.̊��[K%�2�^�-{��;�ޏ�a^�#���/��G'��于u|0��]׺�-��Iy�S�w.�S�-��P������T�Tg\�F��@/�!OC����d�S��i(Ԡ0�������[|n���^�`��+���<��`YhV�s�k�r��K�Q��[	aV���f��#����,Z�#R�#Ϸ�1��Ԗ���i19o��U�����&֒G<�h��Lx����`�2Wl�m������u�הo�Y�9fO��~�׬�ܺ���/�)�Y��j���/�9���Ozo[����YT�k�yD���������d���(&��)V�7�M����H`��C�?�v*6�sc_�sh���;�r�K;�j����C�GM�T;M�zj��Z-�Jc��R[��.>u��sE���v\u�Qc5�c�6�$[Om�;�'E1İ��L�}o�N��b��:��g���3� �����ϭ�~8��'#�>I���3�a�Xk2,���5dIL&���	v��V���AE������M��T��U~�ϩ-�����"�B灙��6�ؕj�>G�dyL��V����{���'�>{iW1%S,E�bQ�Bt2�ܩ����^9���~W������'=�*O-�]J��%�Yh�~әE���0���tn�"�����f#��C�'>e,�K8֝��o1��8s1LcVS�������<��P7k������!�Ld���juT��O�^i�����(r8r��r4S�2��\�����͢�:7��Ք`��x{�=�GE=,���g��ܱ(���Hük��P8w�n�]z�.��;�u�_�q�����|Rei=
kF��o~j�y��;?f波��.�.�sF�n澜�c��Y(��S9v\k�9�)=�q�-��:#��n��G�6���	XV���W�����L΅g4��"B/IiA�hB�}�n�E4ڭ3��cȬ3��A�[� `���� ޶���K��\~&
8@�k�.�S��=�h��[������,�V��z?/'��C�[$$�9��e"�m�
o��?�/�I&y$�FT�P�E� ��P?q�;�wF�s��7��1���؉�<*0�S��!fo@j1�f�x��*�:�m9`�5�a��9�ZϠks��k\U�(����2�H����8 �e���HL�������r�rƓ9�����H����:H�{�r�C>�̦BO&�~3`z�e[,³Jʮ��^lC!"#���5���1�8�����"`0�+@�붅��y��a�O� 0I�:�^DېDJkx�8;�J�GŠ�o`=�2=��s�PQq �]��Q>*��u��̔ۊ�*%d�u� @�1�Oz��vi����@USQ�$/9��"�.'����RjEj�y�9O3��Ij�1v4��1Kd$Ҫ��D Ƌ8;��Y/�ۛmL��j��mh}
�[�a�A��]l�Au ��4E�(u�b��������t�&nRa���E�K�=�c�~n;e�1E�4��ؘ��Y�<�����Q%P�5���e�N1nņû�ֺ� ��8�UK���$��^��h)���. �4�[W s򣪇qmm��Wbg���4����+����4�,{j��;f�O})��e�GV�^�)��wR��pՃ�Ҽ:�̊�ߔ��"�8���1���R1*\��f�����r� �+��%��ǝ��2�ђ�@���� ��@�c�7H�J��7�tn2�g)����̬�_��$��d<��q%�"���r7��0��\Ӫ>����x�t<�TUן����P�s$11$g��m�����x^����@�K�R�n�y�"�l��Ψ�I�gyd�@s �K�`�%�\nR�fe�3JD��:�Y�D46W
@,��T�C˓6�jF%e�h`�+]�-{k����A�5�8�G��|D�Gސ5#UXd�P��@�K�I����ܩD�8��[I�a�Z��u`�������W�H���.�	�m���l�D��N�ZY8vyT\Wz�EW[�H�P�g,އQ~ -���t·&)Sڢ�pkJ������v��'@�����@����h-�;�NX0�'�84=��E{�-��(ح����ț�V�et.x�Z0�=�o~mC�q�ܙ���)S��!�g�.P�f�VӦ75J����s��-y0)�xX~֖�*�Sg���iv��H~k>9���IF�w<���=. �n�W�1�	�'�;m�r�@�u�+E�{޷n�I��#�cͱu����(���|�b�ڕ�wڦ�M���O¬f�"zw�pB���A��9�PS��\@�g���+0ɾ�,-{�~f��;�.��e]�8��Ʒ>#A�S�K�� y�"�u5?��3l��gŹ.-GCpyKU��.�"&��`�@�[��#"�[�孌�����J�v����,�^e�6\��-�*���\�
�9O%2��۽a5�Ӊ`g� ��y�hr�\��U���/����tᕟ*�:��D��'J��Ԑj���;�w��z��N>��.��"5Ե�uT'�M�FR�a@gx����Q�d�D:��Q�>�lDBj$������*�'�x��6��t�*�o��R{2��{>�<@r�a坊3�N7R��~A[�Bt�j\0(�.�k���#�
xq}:��|)Mx�y�g��W���2�)z��(rC�z��P��{�+]C���10Z��z��C�F.��(�Et4Wp�]�����GX4T�p�_�����8l��Tj6`�V6�|�<){�Z;��n���|<�!����J� V��r����>����1�th~ ������zԷ����L�L��G��.Ӑ%��E���tV���p��BkM�6ô>IZ����L���Q��2驹�7�(�:��~@��%��诹�����:CҔ��5;�7��!^\� @���(&��K�m.[��+7-l�~P�~=�Y�Z�&���fS i�X����m�u��+��@�,�%+�?*�[w�A���ޱjӓ��Fv�y�n����g�<����h�2C��,�J�aH���+�P�t�Wp����<e+�P���}� ��8�R�؀�+K�A�
�`c-���R�,���� ��W"�Z�\�L�kw]%}\���|��Wy�)�����Xƒ������	�[���g�o�;l�>4�IJ]n뭘GǘyY8��Ep�+�䠲 �뻝��s�����}�ޏ�bLy���C��S�8��t+�17����h3��
8!�����}{����(���bnf��|CDd��Э���}w�ܠ���tk~Э)`�K;݋(J�5=`ܷ<������S�ܘ4 ݷwJF�่`�"M(
��{�������CST7��4'�����L��mW���%�H��\]~a�օ��B� ��Y�h1��S�N�� ���}i:���мS�>jysXIh�贺u�!Rx �S3�������ñ�yL'�2b����� ��/���+�]ϝi{`���,�8��u��d�1��O ߓ��Ckc��0<^N��L�< ޓB.K�N��u�l�k��{t�WNwύ'H�����-��n���kYQnÁަ�����c�{�=��b���Է�L���۝�<Ά���=s�I�%�!+ �=�1jZCL�����v��g��XU���R\W\b���Zc��q) �  �Q�87<�\!��4�&�i)���&	t��u��Bf	L1%?����:�$oL�4c�·�����r��V�ʃ������@jk��★��Fo<>5	xm�eQy�O�Y����i��H:��T*�{`6H*�Ar�7���ye ��(�k[ �!�"v	�qѥح�'�e
�O�<�\y=�t%��,����H��.�ԓO�H�*�i/<]Ŧ|�2��z4Ύ:��[�}H�U,���p��ǕB�' 0nͣ�ːGIU�1i�ܚ��:��@�RJ�A��F���6���տ�^�,i�����6טּ��I�k!O���m>�����w����X�%�2ό9���Tn8������2߲� p'�;��.�U�d!�ϣ�����銢O�v�"�n�ϣ�|)�� ���搦�lǠ]fzC|S���T�=��:aŹ�9Bs+�;�|'B��rY�qo{���o�����#t�U_�s@R:j�p3����|+7���י���p}��-�[�q�c9���	�?��7dg�~�w� D�g�r=�`-����K'ݾ��'�bo�( �v���8|��&��DW�qE�T��d�3>p"�-�8�������q��o��-2���� �R.%P8�
��Z� F- ��H��]�:�A�$[����b$�G�N.�}���.>(�$�NB:�ز?*��z
%�ů�����^��!}��Tስ��y������b�#|^Etba؁��&�������;4��p�3��t�$���ُj|��K�a�,��]�?l�:�t��"I@�9�����9�<���%})T���mX�E�$<��_�ܝbDVC{F�U� &�C����$�����^V� �6c�������L��Чh ���L0cY�
��.���P�JN�l
���P �Wͪ={ B�Nj���-����,���,���<���*� �'j'+h��2zK7t�[����R��n�	_ie����ϋ���A�#J         T   x�]�1
�0��F��.B�%(����;Y���0F4��� 5X.����Tki=} �!��>����q�c�=�\F"�i%]         �   x��I�0 е�`��_�Ci�����FMО^}�7]F���,,�߆�g�)_�,͡ʻT�W��齊W�� O赩עw�u)�v�6N�׽0|�o�o�����e��W�݌9�b@�f,ǹ�8`Po@�d�6h��g�HK��5�t�2"��j�R�{S��w!V�&�qE�%�A�     
using System.Windows.Forms;

namespace PPE3_VELIBERTE
{
    partial class FormCRUDAdherent
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            this.btnOK = new System.Windows.Forms.Button();
            this.label3 = new System.Windows.Forms.Label();
            this.label2 = new System.Windows.Forms.Label();
            this.tbNom = new System.Windows.Forms.TextBox();
            this.label1 = new System.Windows.Forms.Label();
            this.label4 = new System.Windows.Forms.Label();
            this.tbPrenom = new System.Windows.Forms.TextBox();
            this.label5 = new System.Windows.Forms.Label();
            this.tbAdresse = new System.Windows.Forms.TextBox();
            this.mtbTel = new System.Windows.Forms.MaskedTextBox();
            this.label6 = new System.Windows.Forms.Label();
            this.tbVille = new System.Windows.Forms.TextBox();
            this.mtbCP = new System.Windows.Forms.MaskedTextBox();
            this.pbValid1 = new System.Windows.Forms.PictureBox();
            this.pbNonValid1 = new System.Windows.Forms.PictureBox();
            this.pbValid2 = new System.Windows.Forms.PictureBox();
            this.pbNonValid2 = new System.Windows.Forms.PictureBox();
            this.pbValid3 = new System.Windows.Forms.PictureBox();
            this.pbValid4 = new System.Windows.Forms.PictureBox();
            this.pbValid5 = new System.Windows.Forms.PictureBox();
            this.pbValid6 = new System.Windows.Forms.PictureBox();
            this.pbNonValid3 = new System.Windows.Forms.PictureBox();
            this.pbNonValid4 = new System.Windows.Forms.PictureBox();
            this.pbNonValid5 = new System.Windows.Forms.PictureBox();
            this.pbNonValid6 = new System.Windows.Forms.PictureBox();
            ((System.ComponentModel.ISupportInitialize)(this.pbValid1)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.pbNonValid1)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.pbValid2)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.pbNonValid2)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.pbValid3)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.pbValid4)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.pbValid5)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.pbValid6)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.pbNonValid3)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.pbNonValid4)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.pbNonValid5)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.pbNonValid6)).BeginInit();
            this.SuspendLayout();
            // 
            // btnOK
            // 
            this.btnOK.DialogResult = System.Windows.Forms.DialogResult.OK;
            this.btnOK.FlatStyle = System.Windows.Forms.FlatStyle.Popup;
            this.btnOK.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.btnOK.ForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(0)))), ((int)(((byte)(192)))), ((int)(((byte)(0)))));
            this.btnOK.Location = new System.Drawing.Point(230, 259);
            this.btnOK.Name = "btnOK";
            this.btnOK.Size = new System.Drawing.Size(75, 35);
            this.btnOK.TabIndex = 7;
            this.btnOK.Text = "OK\r\n";
            this.btnOK.UseVisualStyleBackColor = true;
            this.btnOK.Click += new System.EventHandler(this.BtnOK_Click);
            // 
            // label3
            // 
            this.label3.AutoSize = true;
            this.label3.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label3.ForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(0)))), ((int)(((byte)(192)))), ((int)(((byte)(0)))));
            this.label3.Location = new System.Drawing.Point(61, 212);
            this.label3.Name = "label3";
            this.label3.Size = new System.Drawing.Size(83, 16);
            this.label3.TabIndex = 10;
            this.label3.Text = "Téléphone  :";
            // 
            // label2
            // 
            this.label2.AutoSize = true;
            this.label2.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label2.ForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(0)))), ((int)(((byte)(192)))), ((int)(((byte)(0)))));
            this.label2.Location = new System.Drawing.Point(61, 147);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(91, 16);
            this.label2.TabIndex = 9;
            this.label2.Text = "Code Postal  :";
            // 
            // tbNom
            // 
            this.tbNom.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.tbNom.Location = new System.Drawing.Point(182, 43);
            this.tbNom.Name = "tbNom";
            this.tbNom.Size = new System.Drawing.Size(190, 22);
            this.tbNom.TabIndex = 1;
            this.tbNom.Leave += new System.EventHandler(this.tbNom_Leave);
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label1.ForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(0)))), ((int)(((byte)(192)))), ((int)(((byte)(0)))));
            this.label1.Location = new System.Drawing.Point(61, 49);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(43, 16);
            this.label1.TabIndex = 7;
            this.label1.Text = "Nom :";
            // 
            // label4
            // 
            this.label4.AutoSize = true;
            this.label4.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label4.ForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(0)))), ((int)(((byte)(192)))), ((int)(((byte)(0)))));
            this.label4.Location = new System.Drawing.Point(61, 76);
            this.label4.Name = "label4";
            this.label4.Size = new System.Drawing.Size(61, 16);
            this.label4.TabIndex = 14;
            this.label4.Text = "Prénom :";
            // 
            // tbPrenom
            // 
            this.tbPrenom.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.tbPrenom.Location = new System.Drawing.Point(182, 76);
            this.tbPrenom.Name = "tbPrenom";
            this.tbPrenom.Size = new System.Drawing.Size(190, 22);
            this.tbPrenom.TabIndex = 2;
            this.tbPrenom.Leave += new System.EventHandler(this.tbPrenom_Leave);
            // 
            // label5
            // 
            this.label5.AutoSize = true;
            this.label5.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label5.ForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(0)))), ((int)(((byte)(192)))), ((int)(((byte)(0)))));
            this.label5.Location = new System.Drawing.Point(61, 108);
            this.label5.Name = "label5";
            this.label5.Size = new System.Drawing.Size(65, 16);
            this.label5.TabIndex = 16;
            this.label5.Text = "Adresse :";
            // 
            // tbAdresse
            // 
            this.tbAdresse.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.tbAdresse.Location = new System.Drawing.Point(182, 108);
            this.tbAdresse.Name = "tbAdresse";
            this.tbAdresse.Size = new System.Drawing.Size(190, 22);
            this.tbAdresse.TabIndex = 3;
            this.tbAdresse.Leave += new System.EventHandler(this.tbAdresse_Leave);
            // 
            // mtbTel
            // 
            this.mtbTel.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.mtbTel.Location = new System.Drawing.Point(182, 212);
            this.mtbTel.Mask = "00/00/00/00/00";
            this.mtbTel.Name = "mtbTel";
            this.mtbTel.Size = new System.Drawing.Size(100, 22);
            this.mtbTel.TabIndex = 6;
            this.mtbTel.Text = "0";
            this.mtbTel.Leave += new System.EventHandler(this.mtbTel_Leave);
            // 
            // label6
            // 
            this.label6.AutoSize = true;
            this.label6.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label6.ForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(0)))), ((int)(((byte)(192)))), ((int)(((byte)(0)))));
            this.label6.Location = new System.Drawing.Point(61, 182);
            this.label6.Name = "label6";
            this.label6.Size = new System.Drawing.Size(43, 16);
            this.label6.TabIndex = 19;
            this.label6.Text = "Ville  :";
            // 
            // tbVille
            // 
            this.tbVille.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.tbVille.Location = new System.Drawing.Point(182, 179);
            this.tbVille.Name = "tbVille";
            this.tbVille.Size = new System.Drawing.Size(190, 22);
            this.tbVille.TabIndex = 5;
            this.tbVille.Leave += new System.EventHandler(this.tbVille_Leave);
            // 
            // mtbCP
            // 
            this.mtbCP.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.mtbCP.Location = new System.Drawing.Point(182, 147);
            this.mtbCP.Mask = "00000";
            this.mtbCP.Name = "mtbCP";
            this.mtbCP.Size = new System.Drawing.Size(59, 22);
            this.mtbCP.TabIndex = 4;
            this.mtbCP.Leave += new System.EventHandler(this.mtbCP_Leave);
            // 
            // pbValid1
            // 
            this.pbValid1.Image = global::PPE3_VELIBERTE.Properties.Resources.valid_vert;
            this.pbValid1.Location = new System.Drawing.Point(378, 43);
            this.pbValid1.Name = "pbValid1";
            this.pbValid1.Size = new System.Drawing.Size(27, 32);
            this.pbValid1.TabIndex = 23;
            this.pbValid1.TabStop = false;
            this.pbValid1.Visible = false;
            // 
            // pbNonValid1
            // 
            this.pbNonValid1.BackColor = System.Drawing.Color.Transparent;
            this.pbNonValid1.Image = global::PPE3_VELIBERTE.Properties.Resources.valid_rouge;
            this.pbNonValid1.Location = new System.Drawing.Point(378, 43);
            this.pbNonValid1.Name = "pbNonValid1";
            this.pbNonValid1.Size = new System.Drawing.Size(26, 31);
            this.pbNonValid1.TabIndex = 22;
            this.pbNonValid1.TabStop = false;
            this.pbNonValid1.Visible = false;
            // 
            // pbValid2
            // 
            this.pbValid2.Image = global::PPE3_VELIBERTE.Properties.Resources.valid_vert;
            this.pbValid2.Location = new System.Drawing.Point(377, 76);
            this.pbValid2.Name = "pbValid2";
            this.pbValid2.Size = new System.Drawing.Size(27, 32);
            this.pbValid2.TabIndex = 24;
            this.pbValid2.TabStop = false;
            this.pbValid2.Visible = false;
            // 
            // pbNonValid2
            // 
            this.pbNonValid2.BackColor = System.Drawing.Color.Transparent;
            this.pbNonValid2.Image = global::PPE3_VELIBERTE.Properties.Resources.valid_rouge;
            this.pbNonValid2.Location = new System.Drawing.Point(379, 77);
            this.pbNonValid2.Name = "pbNonValid2";
            this.pbNonValid2.Size = new System.Drawing.Size(26, 31);
            this.pbNonValid2.TabIndex = 25;
            this.pbNonValid2.TabStop = false;
            this.pbNonValid2.Visible = false;
            // 
            // pbValid3
            // 
            this.pbValid3.Image = global::PPE3_VELIBERTE.Properties.Resources.valid_vert;
            this.pbValid3.Location = new System.Drawing.Point(377, 108);
            this.pbValid3.Name = "pbValid3";
            this.pbValid3.Size = new System.Drawing.Size(27, 32);
            this.pbValid3.TabIndex = 26;
            this.pbValid3.TabStop = false;
            this.pbValid3.Visible = false;
            // 
            // pbValid4
            // 
            this.pbValid4.Image = global::PPE3_VELIBERTE.Properties.Resources.valid_vert;
            this.pbValid4.Location = new System.Drawing.Point(247, 147);
            this.pbValid4.Name = "pbValid4";
            this.pbValid4.Size = new System.Drawing.Size(27, 32);
            this.pbValid4.TabIndex = 27;
            this.pbValid4.TabStop = false;
            this.pbValid4.Visible = false;
            // 
            // pbValid5
            // 
            this.pbValid5.Image = global::PPE3_VELIBERTE.Properties.Resources.valid_vert;
            this.pbValid5.Location = new System.Drawing.Point(377, 179);
            this.pbValid5.Name = "pbValid5";
            this.pbValid5.Size = new System.Drawing.Size(27, 32);
            this.pbValid5.TabIndex = 28;
            this.pbValid5.TabStop = false;
            this.pbValid5.Visible = false;
            // 
            // pbValid6
            // 
            this.pbValid6.Image = global::PPE3_VELIBERTE.Properties.Resources.valid_vert;
            this.pbValid6.Location = new System.Drawing.Point(288, 212);
            this.pbValid6.Name = "pbValid6";
            this.pbValid6.Size = new System.Drawing.Size(27, 32);
            this.pbValid6.TabIndex = 29;
            this.pbValid6.TabStop = false;
            this.pbValid6.Visible = false;
            // 
            // pbNonValid3
            // 
            this.pbNonValid3.BackColor = System.Drawing.Color.Transparent;
            this.pbNonValid3.Image = global::PPE3_VELIBERTE.Properties.Resources.valid_rouge;
            this.pbNonValid3.Location = new System.Drawing.Point(379, 108);
            this.pbNonValid3.Name = "pbNonValid3";
            this.pbNonValid3.Size = new System.Drawing.Size(26, 31);
            this.pbNonValid3.TabIndex = 30;
            this.pbNonValid3.TabStop = false;
            this.pbNonValid3.Visible = false;
            // 
            // pbNonValid4
            // 
            this.pbNonValid4.BackColor = System.Drawing.Color.Transparent;
            this.pbNonValid4.Image = global::PPE3_VELIBERTE.Properties.Resources.valid_rouge;
            this.pbNonValid4.Location = new System.Drawing.Point(248, 147);
            this.pbNonValid4.Name = "pbNonValid4";
            this.pbNonValid4.Size = new System.Drawing.Size(26, 31);
            this.pbNonValid4.TabIndex = 31;
            this.pbNonValid4.TabStop = false;
            this.pbNonValid4.Visible = false;
            // 
            // pbNonValid5
            // 
            this.pbNonValid5.BackColor = System.Drawing.Color.Transparent;
            this.pbNonValid5.Image = global::PPE3_VELIBERTE.Properties.Resources.valid_rouge;
            this.pbNonValid5.Location = new System.Drawing.Point(379, 179);
            this.pbNonValid5.Name = "pbNonValid5";
            this.pbNonValid5.Size = new System.Drawing.Size(26, 31);
            this.pbNonValid5.TabIndex = 32;
            this.pbNonValid5.TabStop = false;
            this.pbNonValid5.Visible = false;
            // 
            // pbNonValid6
            // 
            this.pbNonValid6.BackColor = System.Drawing.Color.Transparent;
            this.pbNonValid6.Image = global::PPE3_VELIBERTE.Properties.Resources.valid_rouge;
            this.pbNonValid6.Location = new System.Drawing.Point(289, 212);
            this.pbNonValid6.Name = "pbNonValid6";
            this.pbNonValid6.Size = new System.Drawing.Size(26, 31);
            this.pbNonValid6.TabIndex = 33;
            this.pbNonValid6.TabStop = false;
            this.pbNonValid6.Visible = false;
            // 
            // FormCRUDAdherent
            // 
            this.AcceptButton = this.btnOK;
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.BackColor = System.Drawing.Color.White;
            this.ClientSize = new System.Drawing.Size(579, 306);
            this.Controls.Add(this.pbNonValid6);
            this.Controls.Add(this.pbNonValid5);
            this.Controls.Add(this.pbNonValid4);
            this.Controls.Add(this.pbNonValid3);
            this.Controls.Add(this.pbValid6);
            this.Controls.Add(this.pbValid5);
            this.Controls.Add(this.pbValid4);
            this.Controls.Add(this.pbValid3);
            this.Controls.Add(this.pbNonValid2);
            this.Controls.Add(this.pbValid2);
            this.Controls.Add(this.pbValid1);
            this.Controls.Add(this.pbNonValid1);
            this.Controls.Add(this.mtbCP);
            this.Controls.Add(this.tbVille);
            this.Controls.Add(this.label6);
            this.Controls.Add(this.mtbTel);
            this.Controls.Add(this.tbAdresse);
            this.Controls.Add(this.label5);
            this.Controls.Add(this.tbPrenom);
            this.Controls.Add(this.label4);
            this.Controls.Add(this.btnOK);
            this.Controls.Add(this.label3);
            this.Controls.Add(this.label2);
            this.Controls.Add(this.tbNom);
            this.Controls.Add(this.label1);
            this.Name = "FormCRUDAdherent";
            this.Text = "Ajouter / Modifier : table ADHERENT";
            this.Load += new System.EventHandler(this.FormCRUDAdherent_Load);
            ((System.ComponentModel.ISupportInitialize)(this.pbValid1)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.pbNonValid1)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.pbValid2)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.pbNonValid2)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.pbValid3)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.pbValid4)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.pbValid5)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.pbValid6)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.pbNonValid3)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.pbNonValid4)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.pbNonValid5)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.pbNonValid6)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Button btnOK;
        private System.Windows.Forms.Label label3;
        private System.Windows.Forms.Label label2;
        private System.Windows.Forms.TextBox tbNom;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.Label label4;
        private System.Windows.Forms.TextBox tbPrenom;
        private System.Windows.Forms.Label label5;
        private System.Windows.Forms.TextBox tbAdresse;
        private System.Windows.Forms.MaskedTextBox mtbTel;
        private Label label6;
        private TextBox tbVille;
        private MaskedTextBox mtbCP;
        private PictureBox pbNonValid1;
        private PictureBox pbValid1;
        private PictureBox pbValid2;
        private PictureBox pbNonValid2;
        private PictureBox pbValid3;
        private PictureBox pbValid4;
        private PictureBox pbValid5;
        private PictureBox pbValid6;
        private PictureBox pbNonValid3;
        private PictureBox pbNonValid4;
        private PictureBox pbNonValid5;
        private PictureBox pbNonValid6;

        public TextBox TbNom
        {
            get
            {
                return tbNom;
            }

            set
            {
                tbNom = value;
            }
        }

        public TextBox TbPrenom
        {
            get
            {
                return tbPrenom;
            }

            set
            {
                tbPrenom = value;
            }
        }

        public TextBox TbAdresse
        {
            get
            {
                return tbAdresse;
            }

            set
            {
                tbAdresse = value;
            }
        }

        public MaskedTextBox MtbTel
        {
            get
            {
                return mtbTel;
            }

            set
            {
                mtbTel = value;
            }
        }

        public TextBox TbVille
        {
            get
            {
                return tbVille;
            }

            set
            {
                tbVille = value;
            }
        }

        public MaskedTextBox MtbCP
        {
            get
            {
                return mtbCP;
            }

            set
            {
                mtbCP = value;
            }
        }
    }
}